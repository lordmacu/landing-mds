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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($contacts as $contact)
                                    <tr>
                                        <td>{{ $contact}}</td>
                                        <td>philip.chaney@gmail.com</td>
                                        <td>Manager</td>
                                        <td>Admin</td>
                                        <td>Active</td>
                                        <td class="text-right">
                                            <a href="" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                            <a href="" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>

                                    @endforeach
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
 
@endsection 