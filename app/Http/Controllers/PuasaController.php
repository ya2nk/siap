<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PuasaController extends Controller
{
	function index()
	{
		return view('pages.master.jadwal-puasa.index');
	}
}