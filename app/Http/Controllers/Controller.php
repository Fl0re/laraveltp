<?php

namespace App\Http\Controllers;
use App\Users;
use App\Bitcoin;
use App\Monnaie;
use App\Http\Requests\addMonnaieRequest;
use App\Http\Requests\addBitcoinRequest;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function addCompteMethod(){
        return view('addCompte');
    }
    public function addBitcoinService(addBitcoinRequest $request)
    {
        $r = $request->all();
 
        $solde = $r['solde'];
 
        $bitcoin = new Bitcoin();
        $bitcoin->key = rand();
        $bitcoin->user_id = 1;
        $bitcoin->valeur = $solde;

        $bitcoin->save();
 
        // ce redirect nous renvoie sur la page précédente (il s'avère ici que c'est le get qui porte le même attention!!)
        //la méthode with enregistre en session un message qui une fois affiché s'effacera de la session (donc il ne peut être qu'afficher une seule fois).
        return redirect()->back();
    }
    public function addMonnaieService(addMonnaieRequest $request)
    {
        $r = $request->all();
 
        $solde = $r['solde'];
 
        $monnaie = new monnaie();
        $monnaie->key = rand();
        $monnaie->user_id = 1;
        $monnaie->valeur = $solde;

        $monnaie->save();
 
        // ce redirect nous renvoie sur la page précédente (il s'avère ici que c'est le get qui porte le même attention!!)
        //la méthode with enregistre en session un message qui une fois affiché s'effacera de la session (donc il ne peut être qu'afficher une seule fois).
        return redirect()->back();
    }
}