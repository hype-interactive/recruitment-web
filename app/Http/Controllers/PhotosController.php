<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class PhotosController extends Controller
{
    public function store() {
        $this->validate(request(), [
            'photo' => 'required|image:jpeg |image:jpg '
        ]);

        request()->photo->store('uploaded');
        return response('OK',201) ;
    }
}
