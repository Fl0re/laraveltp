<?php

namespace App\Http\Controllers;

use DB;
use App\Users;
use App\Bitcoin;
use App\Monnaie;
use Illuminate\Http\Request;
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

    public function bitTransactionMethod(Request $request)
    {
        $r = $request->all();

        $montant = $r['montant'];
        $compteD = $r['compteD'] +1;
        $compteC = $r['compteC'] +1;

        $bitcoin1 = Bitcoin::find($compteD);
        $bitcoin2 = Bitcoin::find($compteC);

        $montantD = $bitcoin1->valeur - $montant;
        $montantC = $bitcoin2->valeur + $montant;

        if($montantD >= 0){
            DB::table('bitcoins')
            ->where('id', $compteD)
            ->update(['valeur' => $montantD]);
    
            DB::table('bitcoins')
            ->where('id', $compteC)
            ->update(['valeur' => $montantC]);

            return redirect()->back()->with('succes', 'Transaction réussie !');
        }
        else{
            return redirect()->back()->with('error', 'Transaction échouée !');
        }
        

        
    }

    public function ethTransactionMethod(Request $request)
    {
        $r = $request->all();

        $montant = $r['montant'];
        $compteD = $r['compteD'] +1;
        $compteC = $r['compteC'] +1;

        $monnaie1 = Monnaie::find($compteD);
        $monnaie2 = Monnaie::find($compteC);

        $montantD = $monnaie1->valeur - $montant;
        $montantC = $monnaie2->valeur + $montant;

        if($montantD >= 0){
            DB::table('monnaies')
            ->where('id', $compteD)
            ->update(['valeur' => $montantD]);
    
            DB::table('monnaies')
            ->where('id', $compteC)
            ->update(['valeur' => $montantC]);

            return redirect()->back()->with('succes', 'Transaction réussie !');
        }
        else{
            return redirect()->back()->with('error', 'Transaction échouée !');
        }
        

        
    }
}