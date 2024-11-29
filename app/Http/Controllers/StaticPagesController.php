<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class StaticPagesController extends Controller
{
    // homeページを返却
    public function home(): View
    {
        return view('static_pages.home');
    }

    // helpページを返却
    public function help(): View
    {
        return view('static_pages.help');
    }

    // aboutページを返却
    public function about(): View
    {
        return view('static_pages.about');
    }
    
}
