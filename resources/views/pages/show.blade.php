@extends('layouts.app')

@section('meta')
    <meta name="description"
          content="{{$page->title}}">
    <meta name="keywords" content="">

@endsection

@section('title')
    @parent
    - {{$page->title}}
@endsection

{{--
----- Atributos -----
Título: $page->title
Contenido: $page->body
Slug: $page->slug
Url de la Página: $page->url
Url de la Imagen: $page->urlImage
Fecha de creación en Español: $page->fecha
--}}

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @auth
                    @if(Auth::user()->role_id==1)
                        <div class="" style="font-size: 18px">
                            <span><a href="{{url('intranet/pages/'.$page->id.'/edit')}}" target="_blank"><i class="fa fa-edit">Editar Página</i></a> </span>
                            <span><a href="{{url('intranet/pages/'.$page->id)}}" target="_blank"><i class="fa fa-edit">Ver Página</i></a> </span>
                        </div>

                    @endif
                @endauth
                <div class="box-content-builder">
                    {!! $page->body!!}
                </div>
            </div>
        </div>

    </div>


@endsection



