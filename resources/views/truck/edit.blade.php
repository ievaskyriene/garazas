

@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">PAVADINIMAS</div>
               <div class="card-body">
                <div class="form-group">
                    <label>Pavadinimas</label>
                    <input type="text" class="form-control">
                    <small class="form-text text-muted">Kažkoks parašymas.</small>
                  </div>
                <form method="POST" action="{{route('truck.update',[$truck])}}">
                    Maker: <input type="text" name="truck_maker" value="{{$truck->maker}}">
                    Plate: <input type="text" name="truck_plate" value="{{$truck->plate}}">
                    Make_year: <input type="number" name="truck_make_year" value="{{$truck->make_year}}">
                    Mechanic_notices: <textarea name="truck_about" id="summernote">{{$truck->about}}</textarea> //edit
                    <select name="mechanic_id">
                        @foreach ($mechanics as $mechanic)
                            <option value="{{$mechanic->id}}" @if($mechanic->id == $truck->mechanic_id) selected @endif>
                                {{$mechanic->name}} {{$mechanic->surname}}
                            </option>
                        @endforeach
                </select>
                    @csrf
                    <button type="submit">EDIT</button>
                </form>
               </div>
           </div>
       </div>
   </div>
</div>

<script>
    $(document).ready(function() {
       $('#summernote').summernote();
     });
    </script>
@endsection

