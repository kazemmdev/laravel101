<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function __invoke()
    {
        session(['locale' => request('locale')]);
        return redirect()->back();
    }
}
