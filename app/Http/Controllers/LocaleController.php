<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class LocaleController extends Controller
{
    public function __invoke(): RedirectResponse
    {
        session(['locale' => request('locale')]);
        return redirect()->back();
    }
}
