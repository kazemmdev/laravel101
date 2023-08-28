@props([ 'tags' => null ])

<div class="flex-1 w-full relative">
    <input type="text" id="tags-select" name="tags" value="{{ isset($tags) ? $tags->pluck('id') : ''}}" hidden>
    <div class="flex flex-wrap space-x-2 w-full py-2 border-b mb-1">
        <div class="flex flex-wrap space-x-1" id="tags-select-list">
            @forelse($tags ?? [] as $tag)
                <span id="{{ $tag->id }}" class="tag-select-item"><i>×</i>{{ $tag->name }}</span>
            @empty
            @endforelse
        </div>
        <input type="text" id="search-tag" placeholder="Search tags ..." class="outline-none bg-transparent max-w-[140px] py-1" />
    </div >
    <ul id="search-tag-list" class="absolute bg-white inset-x-0 shadow border p-3 hidden rounded-xl"></ul>
</div>

@push('scripts')
    <script type="module">
        let tagSearchInput = document.getElementById("search-tag");
        let tagSearchList = document.getElementById("search-tag-list");
        let tagSelectInput = document.getElementById("tags-select");
        let tagSelectWrap = document.getElementById("tags-select-list");

        tagSearchInput.addEventListener("input", async function (e) {
            const response = await axios.get(`/tags?name=${tagSearchInput.value}`);

            if (response.data.length) {
                tagSearchList.classList.remove("hidden");

                // remove all item inside list
                while (tagSearchList.firstChild) {
                    tagSearchList.removeChild(tagSearchList.firstChild);
                }

                // add found tags inside the list
                response.data.forEach((tag) => {
                    let li = document.createElement("li");
                    li.appendChild(document.createTextNode(tag.name));
                    li.className = "tag-list-item";
                    li.onclick = () => tagSelected(tag);
                    tagSearchList.appendChild(li);
                });
            } else tagSearchList.classList.add("hidden");
        });

        tagSearchInput.addEventListener("keydown", async function (e) {
            if (e.key === "Enter") {
                e.preventDefault();

                const response = await axios.get(
                    `/tags?name=${tagSearchInput.value}`
                );

                if (!response.data.length) {
                    const { data } = await axios.post("/tags", {
                            name: tagSearchInput.value
                    });
                    tagSelected(data);
                }
            }
        });

// Get all the tags inside the parent element add close event
[...tagSelectWrap.getElementsByTagName('span')].forEach(spanTag => {
    spanTag.getElementsByTagName('i')[0].onclick = () => removeSelectedTag(spanTag);
})

        const tagSelected = (tag) => {
            let span = document.createElement("span");
            span.id = tag.id;
            span.className = "tag-select-item";

            let closeBtn = document.createElement("i");
            closeBtn.onclick = () => removeSelectedTag(span)
            closeBtn.appendChild(document.createTextNode('×'));

            span.appendChild(closeBtn);
            span.appendChild(document.createTextNode(tag.name));

            tagSelectWrap.appendChild(span);
            tagSearchList.classList.add("hidden");
            tagSearchInput.value = "";
            tagSelectInput.value = inputTag(parseInt(tag.id));
        }

        const removeSelectedTag = (el) => {
            tagSelectInput.value = inputTag(parseInt(el.id));
            tagSelectWrap.removeChild(el);
        }

        const inputTag = (tagId) => {
            let tags = tagSelectInput.value.length
                ? JSON.parse(tagSelectInput.value)
                : [];
            if (tags.includes(tagId)) {
                const indexToRemove = tags.indexOf(tagId);
                tags.splice(indexToRemove, 1);
                tags = JSON.stringify(tags);
            } else {
                tags.push(tagId);
                tags = JSON.stringify(tags);
            }
            return tags;
        }
    </script>
@endpush
