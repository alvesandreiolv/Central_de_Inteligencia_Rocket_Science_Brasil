<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Hash;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{

	public function __construct() {

		$this->middleware('auth');

	}

	public function index()	{

	//ABAIXO É O MEUS POSTS

		$posts = DB::connection('mysql2')
		->table('wp_rocketsciencebrposts')
		->select('ID', 'post_title', 'post_status', 'post_author', 'post_date')
		->whereIn('post_status', ['publish', 'private'])
		->where('post_type', 'post')
		->orderBy('id', 'desc')
		->paginate(15, ['*'], 'posts');

		$user_ids = $posts->pluck('post_author')->toArray();

		$users = DB::connection('mysql')
		->table('users')
		->whereIn('rsbwordpressid', $user_ids)
		->pluck('rsbwordpressid', 'name')
		->toArray();

		$posts = compact('posts');

		$users = array_flip($users);

		foreach($posts['posts'] as $value){

		// $value->post_author = DB::connection('mysql')->table('users')->select('name')->where('rsbwordpressid', $value->post_author)->value('name');
			
			if (isset($users[$value->post_author])) {
				$value->post_author = $users[$value->post_author];
			}

			if ($value->post_status === 'publish') {
				$value->post_status = 'Publicado';
			} else if ($value->post_status === 'private') {
				$value->post_status = 'Em análise';
			} else if ($value->post_status === 'draft') {
				$value->post_status = 'Rascunho';
			}

		}

		//$posts['posts'][0]->post_author = 'aaaaaaaa';

		return view('posts/posts', $posts);

	}

	public function verpost() {

		$verpost = DB::connection('mysql2')->table('wp_rocketsciencebrposts')->where('id', $_GET["id"])->get();
		$verpost = $verpost[0];
		
		if ($verpost->post_status === 'publish') {
			$verpost->post_status = 'Publicado';
		} else if ($verpost->post_status === 'private') {
			$verpost->post_status = 'Em análise';
		} else if ($verpost->post_status === 'draft') {
			$verpost->post_status = 'Rascunho';
		}

		$verpost->post_author = DB::connection('mysql')->table('users')->select('name')->where('rsbwordpressid', $verpost->post_author)->value('name');

		$verpost->cover_link = DB::connection('mysql2')->table('wp_rocketsciencebrpostmeta')->select('meta_value')->where('post_id', $verpost->ID)->where('meta_key', '_thumbnail_id')->value('meta_value');

		$verpost->cover_link = DB::connection('mysql2')->table('wp_rocketsciencebrpostmeta')->select('meta_value')->where('post_id', $verpost->cover_link)->where('meta_key', '_wp_attached_file')->value('meta_value');

		return view('posts/verpost', compact('verpost'));

	}

	public function criarpostformulario() {

		return view('posts/criarpost');

	}

	public function criarpost(Request $dados) {

		$validator = Validator::make($dados->all(), [

			'titulo' => 'required|min:10|max:100',
			'categoria' => 'required|in:2,4,267',
			'imagem_destaque' => 'required|mimes:jpeg,jpg|dimensions:width=800,height=400',
			'textocompleto' => 'required|min:100|max:1000000',

		]);

		if ($validator->fails()) {
			return view('posts/criarpost', compact('dados'))->withErrors($validator);
		}

		$dados = $dados->all();
		//$dados['rsbwordpressid']

		$ID = DB::connection('mysql2')->table('wp_rocketsciencebrposts')->max('ID');
		$ID++;

		$replace = [
			'&lt;' => '', '&gt;' => '', '&#039;' => '', '&amp;' => '',
			'&quot;' => '', 'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä'=> 'Ae',
			'&Auml;' => 'A', 'Å' => 'A', 'Ā' => 'A', 'Ą' => 'A', 'Ă' => 'A', 'Æ' => 'Ae',
			'Ç' => 'C', 'Ć' => 'C', 'Č' => 'C', 'Ĉ' => 'C', 'Ċ' => 'C', 'Ď' => 'D', 'Đ' => 'D',
			'Ð' => 'D', 'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ē' => 'E',
			'Ę' => 'E', 'Ě' => 'E', 'Ĕ' => 'E', 'Ė' => 'E', 'Ĝ' => 'G', 'Ğ' => 'G',
			'Ġ' => 'G', 'Ģ' => 'G', 'Ĥ' => 'H', 'Ħ' => 'H', 'Ì' => 'I', 'Í' => 'I',
			'Î' => 'I', 'Ï' => 'I', 'Ī' => 'I', 'Ĩ' => 'I', 'Ĭ' => 'I', 'Į' => 'I',
			'İ' => 'I', 'Ĳ' => 'IJ', 'Ĵ' => 'J', 'Ķ' => 'K', 'Ł' => 'K', 'Ľ' => 'K',
			'Ĺ' => 'K', 'Ļ' => 'K', 'Ŀ' => 'K', 'Ñ' => 'N', 'Ń' => 'N', 'Ň' => 'N',
			'Ņ' => 'N', 'Ŋ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O',
			'Ö' => 'Oe', '&Ouml;' => 'Oe', 'Ø' => 'O', 'Ō' => 'O', 'Ő' => 'O', 'Ŏ' => 'O',
			'Œ' => 'OE', 'Ŕ' => 'R', 'Ř' => 'R', 'Ŗ' => 'R', 'Ś' => 'S', 'Š' => 'S',
			'Ş' => 'S', 'Ŝ' => 'S', 'Ș' => 'S', 'Ť' => 'T', 'Ţ' => 'T', 'Ŧ' => 'T',
			'Ț' => 'T', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'Ue', 'Ū' => 'U',
			'&Uuml;' => 'Ue', 'Ů' => 'U', 'Ű' => 'U', 'Ŭ' => 'U', 'Ũ' => 'U', 'Ų' => 'U',
			'Ŵ' => 'W', 'Ý' => 'Y', 'Ŷ' => 'Y', 'Ÿ' => 'Y', 'Ź' => 'Z', 'Ž' => 'Z',
			'Ż' => 'Z', 'Þ' => 'T', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a',
			'ä' => 'ae', '&auml;' => 'ae', 'å' => 'a', 'ā' => 'a', 'ą' => 'a', 'ă' => 'a',
			'æ' => 'ae', 'ç' => 'c', 'ć' => 'c', 'č' => 'c', 'ĉ' => 'c', 'ċ' => 'c',
			'ď' => 'd', 'đ' => 'd', 'ð' => 'd', 'è' => 'e', 'é' => 'e', 'ê' => 'e',
			'ë' => 'e', 'ē' => 'e', 'ę' => 'e', 'ě' => 'e', 'ĕ' => 'e', 'ė' => 'e',
			'ƒ' => 'f', 'ĝ' => 'g', 'ğ' => 'g', 'ġ' => 'g', 'ģ' => 'g', 'ĥ' => 'h',
			'ħ' => 'h', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ī' => 'i',
			'ĩ' => 'i', 'ĭ' => 'i', 'į' => 'i', 'ı' => 'i', 'ĳ' => 'ij', 'ĵ' => 'j',
			'ķ' => 'k', 'ĸ' => 'k', 'ł' => 'l', 'ľ' => 'l', 'ĺ' => 'l', 'ļ' => 'l',
			'ŀ' => 'l', 'ñ' => 'n', 'ń' => 'n', 'ň' => 'n', 'ņ' => 'n', 'ŉ' => 'n',
			'ŋ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'oe',
			'&ouml;' => 'oe', 'ø' => 'o', 'ō' => 'o', 'ő' => 'o', 'ŏ' => 'o', 'œ' => 'oe',
			'ŕ' => 'r', 'ř' => 'r', 'ŗ' => 'r', 'š' => 's', 'ù' => 'u', 'ú' => 'u',
			'û' => 'u', 'ü' => 'ue', 'ū' => 'u', '&uuml;' => 'ue', 'ů' => 'u', 'ű' => 'u',
			'ŭ' => 'u', 'ũ' => 'u', 'ų' => 'u', 'ŵ' => 'w', 'ý' => 'y', 'ÿ' => 'y',
			'ŷ' => 'y', 'ž' => 'z', 'ż' => 'z', 'ź' => 'z', 'þ' => 't', 'ß' => 'ss',
			'ſ' => 'ss', 'ый' => 'iy', 'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G',
			'Д' => 'D', 'Е' => 'E', 'Ё' => 'YO', 'Ж' => 'ZH', 'З' => 'Z', 'И' => 'I',
			'Й' => 'Y', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
			'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F',
			'Х' => 'H', 'Ц' => 'C', 'Ч' => 'CH', 'Ш' => 'SH', 'Щ' => 'SCH', 'Ъ' => '',
			'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'YU', 'Я' => 'YA', 'а' => 'a',
			'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo',
			'ж' => 'zh', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l',
			'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's',
			'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch',
			'ш' => 'sh', 'щ' => 'sch', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e',
			'ю' => 'yu', 'я' => 'ya'
		];

		//ISSO TUDO ABAIXO É PARA FAZER O TRATAMENTO DO TITULO QUE SERÁ UTILIZADO TBM NA URL
		$titulotratado = strtr($dados['titulo'], $replace);
		$titulotratado = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $titulotratado))); //substitui tudo que não serve para uma url
		$ultimocharacter = substr($titulotratado, -1); //pega o ultimo caractere da string
		if ($ultimocharacter === '-') { //caso o ultimo caractere for -, remova ele. Isso serve pq o wordpress não reconhece links que terminam com esse caracere
			$titulotratado = substr_replace($titulotratado, "", -1);
		}

		DB::connection('mysql2')
		->table('wp_rocketsciencebrposts')
		->insert(
			[
				'ID' => $ID,
				'post_author' => Auth::id(),
				'post_date' => Carbon::now(),
				'post_date_gmt' => Carbon::now(),
				'post_content' => $dados['textocompleto'],
				'post_title' => $dados['titulo'],
				'post_excerpt' => '',
				'comment_status' => 'open',
				'ping_status' => 'open',
				'post_password' => '',
				'post_name' => $ID.'-'.$titulotratado,
				'to_ping' => '',
				'pinged' => '',
				'post_modified' => Carbon::now(),
				'post_modified_gmt' => Carbon::now(),
				'post_content_filtered' => '',	
				'post_parent' => 0,	
				'guid' => 'https://rocketsciencebr.com/?p='.$ID,	
				'menu_order' => 0,				
				'post_type' => 'post',	
				'post_mime_type' => '',	
				'comment_count' => 0,	
			]
		);

		DB::connection('mysql2')
		->table('wp_rocketsciencebrterm_relationships')
		->insert(
			[
				'object_id' => $ID,
				'term_taxonomy_id' => $dados['categoria'],
				'term_order' => 0,
			]
		);

		return redirect()->route('posts')->with('mensagemSucesso', 'O post "'.$dados['titulo'].'" foi publicado com sucesso.');

	}

}