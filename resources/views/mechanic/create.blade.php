
 @extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">PAVADINIMAS</div>

                        <form method="POST" action="{{route('mechanic.store')}}" enctype="multipart/form-data">
                            <div class="form-group">
                                <label> Name:</label>
                                <input type="text" name="mechanic_name">
                                <small class="form-text text-muted">Įveskite mechaniko vardą.</small>
                           </div>
                           <div class="form-group">
                                <label>Surname:</label>
                                <input type="text" name="mechanic_surname">
                                <small class="form-text text-muted">Įveskite mechaniko pavardę.</small>
                            </div>

                            <div class="form-group">
                                Profile picture: <input type="file" name="portret">
                                <small class="form-text text-muted">Parinkite mechaniko nuotrauką.</small>
                            @csrf
                            </div>
                            <button type="submit">ADD</button>
                         </form>
                </div>
           </div>
       </div>
   </div>
</div>
@endsection


