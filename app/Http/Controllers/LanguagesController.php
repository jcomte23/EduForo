<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LanguagesController extends Controller
{
    public function setLang(string $locale)
    {
        return redirect()->back()->withCookie('locale', $locale);
    }
}
