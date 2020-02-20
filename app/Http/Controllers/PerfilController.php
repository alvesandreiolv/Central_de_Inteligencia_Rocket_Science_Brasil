<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Hash;

class PerfilController extends Controller
{
	public function __construct()	{

		$this->middleware('auth');

	}

	public function index()	{

		$membros = DB::table('users')->paginate(50, ['*'], 'membros');
		$infogerais['membroscadastrados'] = DB::table('users')->count();

		return view('perfil/perfil', compact('membros'))->with('infogerais', $infogerais);

	}

}
