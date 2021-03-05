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
            $path=$request->file->store('/public/uploaded_doc');
            $path_to_upload=substr($path,7);
            $document->path=$path_to_upload;
        }
        if($document->save())
        return $document;
    }
    public function download($document_id)
    {
            $document_path=ApplicationDocument::find($document_id);


            $file =Storage::disk('public')->download($document_path->path);
            $headers = array('Content-Type: application/pdf',);
            return Response::download($file, 'info.pdf',$headers);
    }
}


