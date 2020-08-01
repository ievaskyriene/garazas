

 @extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">PAVADINIMAS</div>

               <div class="card-body">
              

                  {{-- <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="book_title"  class="form-control" value="{{$book->title}}">
                    <small class="form-text text-muted">Knygos pavadinimas.</small>
                    </div> --}}

                <form method="POST" action="{{route('mechanic.update',[$mechanic->id])}}" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Vardas</label>
                       <input type="text" name="mechanic_name" value="{{$mechanic->name}}">
                        <small class="form-text text-muted">Mechaniko vardas.</small>
                    </div>
                    <div class="form-group">
                        <label>Pavarde</label>
                        <input type="text" name="mechanic_surname" value="{{$mechanic->surname}}">
                        <small class="form-text text-muted">Mechaniko pavarde.</small>
                    </div>
                    <div class="form-group">
                        <img src="{{asset('images/'.$mechanic->portret)}}" style="width: 250px; height: auto;">
                    </div>
                    <div class="form-group">
                        Profile picture: <input type="file" name="portret">
                        <small class="form-text text-muted">Pakeiskite mechaniko nuotrauka.</small>
                    </div>
              
                    @csrf
                    <button type="submit">EDIT</button>
                 </form>
               </div>
           </div>
       </div>
   </div>
</div>






@endsection
