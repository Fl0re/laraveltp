<?php

namespace App\Http\Controllers;

use App\Bitcoin;
use App\Monnaie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compte= Bitcoin::all();
        $arrayCompte=array();
        foreach($compte as $c){
            array_push($arrayCompte, $c->id);
        }
     
        $comptem= Monnaie::all();
        $arrayCompteE=array();
        foreach($comptem as $cE){
            array_push($arrayCompteE, $cE->id);
        }
        return view('home', array(
            'compteB' => $arrayCompte,
            'compteE' => $arrayCompteE
        ));

    }
}
