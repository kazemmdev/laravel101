<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
    public function store(RegisterRequest $request): RedirectResponse
    {
        $user = User::create($request->validated());

        auth()->login($user);

        return redirect("/tasks");
    }

    public function create(): View
    {
        return view('auth.register');
    }
}
