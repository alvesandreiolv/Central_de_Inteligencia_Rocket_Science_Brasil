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

	

}