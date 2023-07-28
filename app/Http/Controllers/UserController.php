<?php

namespace Controllers;

class UserController extends Controller
{
    public function __invoke()
    {
        $users = [
            'John',
            'Mike',
            'Susan',
            'Jimmy',
            'Kazem'
        ];

        return view('me.friends', compact('users'));
    }
}
