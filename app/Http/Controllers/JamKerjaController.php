<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JamKerja;
use Yajra\Datatables\DataTables;

class JamKerjaController extends Controller
{
    function index()
    {
        return view('master.jam-kerja.index');
    }
    
    function data()
    {
        $model = JamKerja::query();
        return Datatables::of($model)->make(true);
    }
    
    function save(Request $req)
    {
        return response($req->all());
    }
}
