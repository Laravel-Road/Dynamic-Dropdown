<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DynamicDropdownController extends Controller
{
    public function index()
    {
        return view('dynamic-dropdown.index');
    }
}
