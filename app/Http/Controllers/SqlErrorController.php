<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SqlErrorController extends Controller
{
    public function index()
    {
        return view('errors.sql');
    }
}
