
@extends('layouts.app')

@section('content')
    
@foreach ($mechanics as $mechanic)
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">{{$mechanic->name}} {{$mechanic->surname}}</div>

              <div class="card-body">
                <a href="{{route('mechanic.edit',[$mechanic])}}">{{$mechanic->name}} {{$mechanic->surname}}</a>
  
                <form method="POST" action="{{route('mechanic.destroy', [$mechanic])}}">
                 @csrf
                 <button type="submit">DELETE</button>
                </form>
                <br><br>

                <img src="{{asset('images/'.$mechanic->portret)}}" style="width: 250px; height: auto;">

              
                <br><br>
             
                Turi sunkvežimių: {{$mechanic->mechanicTrucks->count()}}
              
                <br><br>
              
              <a href="{{route('mechanic.show', [$mechanic])}}"> Parodyti mechaniko sunkvežimius </a>
              
              <br>
              </div>
          </div>
      </div>
  </div>
</div>
@endforeach
@endsection

