
@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">{{$mechanic->name}} remontuojami sunkvezimiai:</div>
               <div class="card-body">
                @foreach ($mechanic->mechanicTrucks as $truck)
                <div class="form-group">
                Gamintojas: {{$truck->maker}}
                </div>
                <div class="form-group">
                Valstybinis numeris: {{$truck->plate}} 
                </div>
                <div class="form-group">
                Pagaminimo metai: {{$truck->make_year}}
                </div>
                <div class="form-group">
                Pastabos: {{$truck->mechanic_notices}}
                </div><hr>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>
@endsection
