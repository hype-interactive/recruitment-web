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

            // $name = preg_replace('/\s+|-/', '_', $name);

            // error persists here so changed to name of uploader with time stamp
            $user_name = auth()->user()->fname;
            $name = $user_name.'_'.'CV'.'_'.time().'.'.$extension;

            $path = $request->file('file')->storeAs('public/uploaded_doc', $name);

            $document= new ApplicationDocument();
            $document->name=$name;
            $document->type='cv';
            $document->path=$path;
        }
        if($document->save())
            return $document;
    }

}


