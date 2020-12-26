@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">

                    <h2>Inicio</h2>
                    <div class="card-body">
                        <ul>
                            <li><a href="{{route('datatables')}}">DataTables</a></li>
                            <li><a href="#">OwlCarousel</a></li>
                            <li><a href="{{route('infinitescroll')}}">Infinite Scroll</a></li>
                            <li><a href="{{route('pagina','pagina-de-prueba')}}">Pagina de prueba</a> </li>
                            <li><a href="{{route('pagina','pagina-de-prueba')}}">Noticia de prueba</a> </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
