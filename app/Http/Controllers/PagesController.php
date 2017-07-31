<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about()
    {
        $abc = 123;
        $dd = 456;
        return view('about', compact('abc', 'dd'));
    }
}
