@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-md-6 offset-md-3">
    <form>
    <div class="form-group">
        <label for="name">Nombres y apellidos</label>
        <input type="text" class="form-control" id="name" aria-describedby="Ingrese el nombre" placeholder="Ingrese el nombre">
     </div>
    <div class="form-group">
        <label for="email">Correo electrónico</label>
        <input type="email" class="form-control" id="email" aria-describedby="Ingrese el correo electrónico">
        <small id="emailHelp" class="form-text text-muted">Nunca compartiremos su correo electrónico con nadie más.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
</div> 
@endsection