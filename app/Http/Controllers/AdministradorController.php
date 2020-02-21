<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdministradorController extends Controller
{
	
	public function __construct()	{
		$this->middleware('auth');
	}

	public function index()	{
		return view('administrador/administrador');
	}

}
