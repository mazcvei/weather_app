@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <h2>Data Tables</h2>
                    <div class="card-body">
                        <table id="table_id" class="table table-striped table-bordered display nowrap" style="width:100%">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>email</th>
                                <th>Nick</th>
                                <th>Telefono</th>
                                <th>Nacimiento</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($estudiantes as $estudiante)
                            <tr>
                                <td>{{$estudiante->id}}</td>
                                <td>{{$estudiante->name}}</td>
                                <td>{{$estudiante->email}}</td>
                                <td>{{$estudiante->username}}</td>
                                <td>{{$estudiante->phone}}</td>
                                <td>{{$estudiante->dob}}</td>

                            </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
