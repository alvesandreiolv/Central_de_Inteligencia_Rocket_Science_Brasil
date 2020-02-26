<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
use Carbon\Carbon;

class RegisterController extends Controller {

    use RegistersUsers;

    public function __construct() {
        $this->middleware('guest');
        $this->redirectTo = route('inicio');
    }

    protected function validator(array $data) {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
           // 'g-recaptcha-response' => 'required'
        ]);
    }

    protected function create(array $data) {

        $primeironomeemminusculo = explode(' ', trim($data['name']));

        $primeironomeemminusculo = strtolower($primeironomeemminusculo[0]); 

        DB::connection('mysql2')->table('wp_rocketsciencebrusers')->insert(
            [ 'user_login' => $primeironomeemminusculo, 'user_pass' => 'membros_n_podem_acessar_o_wordpress', 'user_nicename' => $primeironomeemminusculo, 'user_email' => $data['email'], 'user_url' => 'indefinido', 'user_registered' => Carbon::now(), 'user_activation_key' => 'indefinido', 'user_status' => 0, 'display_name' => $data['name'], ]
        );

        $maxid = DB::connection('mysql2')->table("wp_rocketsciencebrusers")->max('id');

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'rsbwordpressid' => $maxid,
            'sobre' => 'Entusiasta de Astronomia e Astronáutica.',
            'password' => Hash::make($data['password']),
        ]);



    }

}
