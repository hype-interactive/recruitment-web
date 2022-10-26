<?php

namespace App\Http\Controllers;
use App\Models\ApplicationDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
class ApplicationDocumentController extends Controller
{
    public function add(Request $request)
    {
        
        if($request->hasFile('file')){
            $file = $request->file('file');

            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            $path=$request->file('file')->store('public/uploaded_doc');

            $document= new ApplicationDocument();
            $document->name=$name;
            $document->type='cv';
            $document->path=$path;
        }
        if($document->save())
            return $document;
    }

}


