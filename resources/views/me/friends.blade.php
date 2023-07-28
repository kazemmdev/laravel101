<ul>
    <li>
        <a href="/">Home</a>
        <a href="/about">About</a>
        <a href="/me">Profile</a>
    </li>
</ul>

<h1>My Friends</h1>

<ul>
    @foreach ($users as $user) 
        <li> {{ $user }} </li>
    @endforeach
</ul>
