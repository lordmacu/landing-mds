@extends('layouts.admin')

@section('content')

<div class="container-fluid">
                    <div class="page-title">
                        <h3>Users 
                            <a href="roles.html" class="btn btn-sm btn-outline-primary float-right"><i class="fas fa-user-shield"></i> Roles</a>
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
 
@endsection 