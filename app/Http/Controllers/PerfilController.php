<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Hash;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
	public function __construct()	{

		$this->middleware('auth');

	}

	public function index()	{

		$perfil = DB::table('users')->where('id', Auth::id())->get();
		$perfil = $perfil[0];

		return view('perfil/perfil', compact('perfil'));

	}

	public function editarperfilformulario()	{

		$perfil = DB::table('users')->where('id', Auth::id())->get();
		$perfil = $perfil[0];

		return view('perfil/editarperfil', compact('perfil'));

	}

	public function editarperfil(Request $dados)	{

		if (!empty($dados['password'])) {

			$validatedData = $dados->validate([

				'name' => 'required',
				'password' => 'required|min:8',
				'confirmpassword' => 'required|same:password'

			]);

		} else {

			$validatedData = $dados->validate([

				'name' => 'required',

			]);

		}

		$dados = $dados->all();

		if (empty($dados['sobre'])) {
			$dados['sobre'] = 'Entusiasta de Astronomia e Astronáutica.';
		}

			DB::table('users')->where('id', $dados['id'])->update(
				[ 'name' => $dados['name'], 'sobre' => $dados['sobre'], 'updated_at' => Carbon::now(),  ]
			);

		if (!empty($dados['password'])) {

			$dados['password'] = Hash::make($dados['password']);
			DB::table('users')->where('id', $dados['id'])->update(	[ 'password' => $dados['password']  ]	);

		}

		return redirect()->route('perfil')->with('mensagemSucesso',  'As suas informações foram atualizadas com sucesso.');

	}

}
