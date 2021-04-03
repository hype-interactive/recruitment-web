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
        $document= new ApplicationDocument();
        $document->name=$request->file_name;
        $document->type='cv';
        if($request->hasFile('file')){
            $path=$request->file->store('uploaded_doc');
            $document->path=$path;
        }
        if($document->save())
        return $document;
    }

}


