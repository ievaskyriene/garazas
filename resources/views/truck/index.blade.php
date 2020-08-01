
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>TRUCKS LIST</h1>
                    <a href="{{route('truck.index')}}">RESET</a>
                    <form action="{{route('truck.index')}}" method="get">
                    <select name="mechanic_id">
                        <option value="0">Show All</option>
                        @foreach ($mechanics as $mechanic)
                            <option value="{{$mechanic->id}}" @if($selectId == $mechanic->id) selected @endif>{{$mechanic->name}} {{$mechanic->surname}}</option>
                        @endforeach
                        </select><br><br>
                        Sort By: <br>
                        Maker: <input type="radio" name="sort" value="maker" @if('maker' == $sort) checked @endif><br>
                        Plate: <input type="radio" name="sort" value="plate" @if('plate' == $sort) checked @endif><br>
                        Make_year: <input type="radio" name="sort" value="make_year" @if('make_year' == $sort) checked @endif><br>
                        <button type="submit">FILTER</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($trucks as $truck)
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">{{$truck->maker}} {{$truck->plate}} <br> {{$truck->truckMechanic->name}} {{$truck->truckMechanic->surname}} <br>{{$truck->make_year}}</div>
                    <a href="{{route('truck.edit', [$truck])}}">[EDIT]</a> <a href="{{route('truck.show', [$truck])}}">[SHOW]</a><br>
                <form action="{{route('truck.destroy', [$truck])}}" method="post">
                    @csrf
                    <button type="submit">DELETE</button>
                </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endforeach
@endsection