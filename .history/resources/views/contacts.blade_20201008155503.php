@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="page-title">
    <h3>Contactos
      <a href="/downloadContacts" class="btn btn-sm  float-right orange-btn"><i class="fas fa-user-shield"></i> Descargar</a>
    </h3>
  </div>
  <div class="box box-primary">
    <div class="box-body">
      <table width="100%" class="table table-hover" id="dataTables-example">
        <thead>
          <tr>
            <th>Nombres</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Tipo de documento</th>
            <th>Número del documento</th>
            <th>Dirección</th>
            <th>Donde?</th>
            <th>Fecha Creación</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($contacts as $contact)
          <tr>
            <td>{{$contact->names}}</td>
            <td>{{$contact->email}}</td>

            <td>{{$contact->phone}}</td>
            <td>{{$contact->documentType}}</td>
            <td>{{$contact->documentNumber}}</td>
            <td>{{$contact->address}}</td>
            <td>{{$contact->knowUs}}</td>
            <td>{{$contact->created_at}}</td>

          </tr>

          @endforeach

        </tbody>
      </table>
    </div>
  </div>
</div>
{{ $users->links() }}

@endsection