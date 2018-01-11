@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1> <a href="{{url('/addCompte')}}"> creer </a> </h1>

                    <h2> Comptes bitcoins </h2>
                    <?php

                        use App\Bitcoin;
                        $bitcoin= Bitcoin::all();
                        foreach ($bitcoin as $bit){
                            echo"compte: ";
                            echo $bit->id;
                            echo"<br>";
                            echo "solde: ";
                            echo $bit->valeur;
                            echo "<hr>";
                        }


                    ?>
                    <h2> Comptes etherium </h2>
                    <?php

                        use App\Monnaie;
                        $monnaie= Monnaie::all();
                        foreach ($monnaie as $mon){
                            echo"compte: ";
                            echo $mon->id;
                            echo"<br>";
                            echo "solde: ";
                            echo $mon->valeur;
                            echo "<hr>";
                        }


                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
