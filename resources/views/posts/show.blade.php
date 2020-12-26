@extends('layouts.app')

@section('meta')
    <meta name="description"
          content="">
    <meta name="keywords" content="">
    {{--<meta name="author" content="Javier García">--}}
@endsection

@section('title')
    @parent
    - Noticia de Ejemplo
@endsection

@section('content')
    @auth
        @if(Auth::user()->role_id==1)
            <div class="" style="font-size: 18px">
                <span><a href="{{url('intranet/posts/'.$post->id.'/edit')}}" target="_blank"><i class="fa fa-edit">Editar Noticia</i></a> </span>
                <span><a href="{{url('intranet/posts/'.$post->id)}}" target="_blank"><i class="fa fa-edit">Ver Noticia</i></a> </span>
            </div>

        @endif
    @endauth

@endsection
