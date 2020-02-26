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

		if (empty($dados['sobre'])) {
			$dados['sobre'] = 'Entusiasta de Astronomia e Astronáutica.';
		}

		//ABAIXO SERVE PARA O BANCO DE DADOS WORDPRESS
		$dados['rsbwordpressid'] = DB::table('users')->where('id', $dados['id'])->value('rsbwordpressid');
		
		if (!empty($dados['rsbwordpressid'])) {

			$nomedivididoempartes = explode(' ', trim($dados['name']));
			$primeironomeemminusculo = strtolower($nomedivididoempartes[0]); 

			if (!isset($nomedivididoempartes[1])) { $nomedivididoempartes[1] = ''; } else { $nomedivididoempartes[1] = ' '.$nomedivididoempartes[1]; }

			$dados['nomeesobrenome'] = $nomedivididoempartes[0].$nomedivididoempartes[1];

			//abaixo atualiza as informações no banco de dados do wordpress
			DB::connection('mysql2')->table('wp_rocketsciencebrusers')->where('id', $dados['rsbwordpressid'])->update(
				[ 'user_login' => $primeironomeemminusculo, 'user_nicename' => $primeironomeemminusculo, 'user_url' => $dados['linkprojeto'], 'display_name' => $dados['nomeesobrenome'], ]
			);

			//abaixo verifica quais METAs não existem para o usuário no banco de dados do wordpress, então registra

				DB::connection('mysql2')->table('wp_rocketsciencebrusermeta')->insert( ['user_id' => $dados['id'], 'meta_key' => 'facebook'] );

				DB::connection('mysql2')->table('wp_rocketsciencebrusermeta')->insert( ['user_id' => $dados['id'], 'meta_key' => 'whatsapp'] );

				DB::connection('mysql2')->table('wp_rocketsciencebrusermeta')->insert( ['user_id' => $dados['id'], 'meta_key' => 'linkedin'] );

				DB::connection('mysql2')->table('wp_rocketsciencebrusermeta')->insert( ['user_id' => $dados['id'], 'meta_key' => 'instagram'] );

				DB::connection('mysql2')->table('wp_rocketsciencebrusermeta')->insert( ['user_id' => $dados['id'], 'meta_key' => 'youtube'] );

				DB::connection('mysql2')->table('wp_rocketsciencebrusermeta')->insert( ['user_id' => $dados['id'], 'meta_key' => 'twitter'] );

				DB::connection('mysql2')->table('wp_rocketsciencebrusermeta')->insert( ['user_id' => $dados['id'], 'meta_key' => 'github'] );

			//abaixo insere os metas

			DB::connection('mysql2')->table('wp_rocketsciencebrusermeta')->where('user_id', $dados['id'] )->where('meta_key', 'whatsapp')->update([ 'meta_value' => $dados['whatsapp'] ]);
			DB::connection('mysql2')->table('wp_rocketsciencebrusermeta')->where('user_id', $dados['id'] )->where('meta_key', 'linkedin')->update([ 'meta_value' => $dados['linkedin'] ]);
			DB::connection('mysql2')->table('wp_rocketsciencebrusermeta')->where('user_id', $dados['id'] )->where('meta_key', 'facebook')->update([ 'meta_value' => $dados['facebook'] ]);
			DB::connection('mysql2')->table('wp_rocketsciencebrusermeta')->where('user_id', $dados['id'] )->where('meta_key', 'instagram')->update([ 'meta_value' => $dados['instagram'] ]);
			DB::connection('mysql2')->table('wp_rocketsciencebrusermeta')->where('user_id', $dados['id'] )->where('meta_key', 'youtube')->update([ 'meta_value' => $dados['youtube'] ]);
			DB::connection('mysql2')->table('wp_rocketsciencebrusermeta')->where('user_id', $dados['id'] )->where('meta_key', 'twitter')->update([ 'meta_value' => $dados['twitter'] ]);
			DB::connection('mysql2')->table('wp_rocketsciencebrusermeta')->where('user_id', $dados['id'] )->where('meta_key', 'github')->update([ 'meta_value' => $dados['github'] ]);

			DB::connection('mysql2')->table('wp_rocketsciencebrusermeta')->where('user_id', $dados['id'] )->where('meta_key', 'description')->update([ 'meta_value' => $dados['sobre'] ]);

		}

		//abaixo atualiza as informações no banco de dados da plataforma
		DB::table('users')->where('id', $dados['id'])->update(
			[ 'name' => $dados['name'], 'whatsapp' => $dados['whatsapp'], 'linkedin' => $dados['linkedin'], 'facebook' => $dados['facebook'], 'youtube' => $dados['youtube'], 'instagram' => $dados['instagram'], 'twitter' => $dados['twitter'], 'github' => $dados['github'], 'linkprojeto' => $dados['linkprojeto'], 'linkprojeto' => $dados['linkprojeto'], 'email' => $dados['email'], 'credencial' => $dados['credencial'], 'sobre' => $dados['sobre'], 'updated_at' => Carbon::now(),  ]
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
