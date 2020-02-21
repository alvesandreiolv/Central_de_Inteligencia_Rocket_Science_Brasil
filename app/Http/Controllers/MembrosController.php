<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Hash;

class MembrosController extends Controller
{
	public function __construct()	{

		$this->middleware('auth');

	}

	public function index()	{

		$membros = DB::table('users')->orderBy('credencial', 'asc')->orderBy('id', 'desc')->paginate(50, ['*'], 'membros');
		$infogerais['membroscadastrados'] = DB::table('users')->count();

		return view('administrador/membros', compact('membros'))->with('infogerais', $infogerais);

	}

	public function vermembro()	{

		$vermembro = DB::table('users')->where('id', $_GET["id"])->get();
		$vermembro = $vermembro[0];

		return view( 'administrador/vermembro', compact('vermembro') );

	}

	public function editarmembroformulario()	{

		$vermembro = DB::table('users')->where('id', $_GET["id"])->get();
		$vermembro = $vermembro[0];

		return view( 'administrador/editarmembro', compact('vermembro') );

	}

	public function editarmembro(Request $dados)	{

		if (!empty($dados['password'])) {

			$validatedData = $dados->validate([

				'name' => 'required',
				'email' => 'required',
				'credencial' => 'required',
				'password' => 'required|min:8',

			]);

		} else {

			$validatedData = $dados->validate([

				'name' => 'required',
				'email' => 'required',
				'credencial' => 'required',

			]);

		}

		$dados = $dados->all();

		DB::table('users')->where('id', $dados['id'])->update(
			[ 'name' => $dados['name'], 'email' => $dados['email'], 'credencial' => $dados['credencial'], 'sobre' => $dados['sobre'], 'updated_at' => Carbon::now(),  ]
		);

		if (!empty($dados['password'])) {
			$dados['password'] = Hash::make($dados['password']);
			DB::table('users')->where('id', $dados['id'])->update(	[ 'password' => $dados['password']  ]	);
		}

		return redirect()->route('membros')->with('mensagemSucesso',  'As informações do membro "'.$dados['name'].'" foram atualizadas com sucesso.');

	}

	public function bloquearmembro() {

		DB::table('users')->where('id', $_GET["id"])->update( [ 'credencial' => 80 ] );
		return redirect()->route('membros')->with('mensagemSucesso',  'O membro ID #'.$_GET["id"].' foi bloqueado com sucesso e não pode mais acessar a plataforma.');

	}


}
