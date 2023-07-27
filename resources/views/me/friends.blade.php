<h1>My Friends</h1>

<ul>
    @foreach ($users as $user) 
        <li> {{ $user }} </li>
    @endforeach
</ul>
