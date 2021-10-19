<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class LoginController extends Controller
{
	
	function index()
	{
		return view('login');
	}
	
	function login(Request $req)
	{
		$remember = false;
		if ($req->remember == 1){
			$remember = true;
		}
		
		if (Auth::attempt(['username' => $req->username,'password'=>$req->password],$remember)) {
			$user = Auth::user();
			
			if ($user->status == 0){
				$req->session()->flush();
				return response(['error'=>true,'message'=>"Akun Belum Aktif"]);
			}
			return response(["error"=>false,'message'=>'Login Berhasil']);
		} else {
			return response(["error"=>true,'message'=>'Login Gagal, Silakan Periksa Username dan Password anda kembali']);
		}
		
	}
}