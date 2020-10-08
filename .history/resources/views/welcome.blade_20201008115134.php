@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-md-6 offset-md-3">
        <form>
            <div class="form-group">
                <label for="name">Nombres y apellidos</label>
                <input type="text" class="form-control" id="name" aria-describedby="Ingrese el nombre y apellido" placeholder="Ingrese el nombre y apellido">
            </div>
            <div class="row">
                <div class="col-12 col-md-8 col-lg-8">

                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input type="email" class="form-control" id="email" aria-describedby="Ingrese el correo electrónico" placeholder="Ingrese el correo electrónico">
                        <small id="emailHelp" class="form-text text-muted">Nunca compartiremos su correo electrónico con nadie más.</small>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-4">

                    <div class="form-group">
                        <label for="phone">Teléfono</label>
                        <input type="tel" class="form-control" id="phone" placeholder="Ingrese el correo electrónico">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="phone">Tipo de documento</label>
                        <select class="form-control">
                            <option value="">Seleccione una opción</option>
                            <option value="1">Cédula</option>
                            <option value="2">Pasaporte</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="phone">Número</label>
                        <input type="tel" class="form-control" id="phone">
                    </div>
                </div>
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