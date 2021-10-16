<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JamKerjaController extends Controller
{
    function index()
    {
        return view('master.jam-kerja.index');
    }
}
