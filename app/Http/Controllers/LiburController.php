<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libur;
use Yajra\Datatables\DataTables;

class LiburController extends Controller
{
	function index()
	{
		return view('master.libur.index');
	}
	
	function data()
    {
        $model = Libur::query();
        return Datatables::of($model)->make(true);
    }
}