@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">

                    <h2>Upload Files</h2>
                    <div class="card-body">
                       <form action="{{route('upload.files')}}" method="post" enctype="multipart/form-data">
                           @csrf
                           <input class="form-control" type="file" name="file">
                           <input type="submit" value="Enviar">
                       </form>
                    </div>

                    <div class="card-body">
                        @if(isset($files))
                                @foreach($files as $file)
                                    <img style="width: 250px" src="{{asset('storage/'.$file->path)}}" title="{{asset('storage/files'.$file->path)}}"
                                    >
                                    <a href="{{route('download.files',$file->path)}}" >{{$file->path}}</a><br>
                                @endforeach
                            @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
