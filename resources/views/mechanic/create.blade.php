
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

                        <form method="POST" action="{{route('mechanic.store')}}" enctype="multipart/form-data">
                            <div class="form-group">
                                Name: <input type="text" name="mechanic_name">
                                Surname: <input type="text" name="mechanic_surname">
                            </div>
                            <div class="form-group">
                                Profile picture: <input type="file" name="portret">
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


