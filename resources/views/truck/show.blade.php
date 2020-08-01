
@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">{{$truck->maker}} {{$truck->plate}}</div>
               <div class="card-body">
                   
                    Priziuri: {{$truck->truckMechanic->name}} {{$truck->truckMechanic->surname}} <br>
                    <div class="form-group">
                        Pagaminimo metai: {{$truck->make_year}}
                    </div>
                    <div class="form-group">
                        Pastabos: {{$truck->mechanic_notices}}
                    </div>
                 </div>
            </div>
         </div>
    </div>
</div>
@endsection