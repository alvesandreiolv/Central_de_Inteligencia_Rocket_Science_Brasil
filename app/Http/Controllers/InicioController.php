<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class InicioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$teste = DB::connection('mysql2')->table("wp_rocketsciencebrusers")->max('id');
        return view('inicio/inicio');
      //  return view('inicio/inicio')->with('mensagemSucesso',  $teste);

    }

    public function boasvindas()
    {
     return view('inicio/boasvindas');
 }

}
