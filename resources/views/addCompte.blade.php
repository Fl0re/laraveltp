@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                
   <h1> Add compte </h1>
   <h2> Bitcoin </h2>

   {{ Form::open(array('url'=>'addBitcoin')) }}
   
              {{Form::label('solde','Solde')}}
              {{Form::number('solde')}}
   
              {{Form::submit('Add')}}
          {{ Form::close() }}

   <h2> Etherium </h2>
   {{ Form::open(array('url'=>'addMonnaie')) }}
   
              {{Form::label('solde','Solde')}}
              {{Form::number('solde')}}
   
              {{Form::submit('Add')}}
          {{ Form::close() }}
        </div>
    </div>
</div>
</div>
@endsection
