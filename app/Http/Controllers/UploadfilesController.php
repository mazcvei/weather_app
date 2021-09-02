<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Util\Filesystem;

class UploadfilesController extends Controller
{
    public function upload(Request $request){
        $path='';
        if($request->has('file')){
            $name=$request->file('file')->getClientOriginalName();
            //dd($request->file('file')->getMimeType());
           // dd($request->file('file')->getSize()); //En bytes
          //  $path = Storage::putFileAs('public', $request->file('file'),$name); //publicos
            $path = Storage::putFileAs('files', $request->file('file'),$name); //privados
            $file=File::create([
                'user_id'=>auth()->id(),
                'path'=>$name,
            ]);
        }
        $files=File::all();
        return view('upload_files',compact('files'));
    }
    public function download($path){
        $file=File::where('user_id',auth()->id())->where('path',$path)->first();
        if($file!=null && $file->user_id==auth()->id() ){
           // return Storage::download('public/'.$path); // para descargar ficheros publicos necesario : php artisan storage:link

            return Storage::download ('files/'.$path); //ficheros privados
        }else{
            dd('El fichero no existe o no tienes permiso para descargarlo');
        }

    }
}
