<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class PhotosController extends Controller
{
    public function store() {
        $this->validate(request(), [
            'photo' => 'required|image:jpeg '
        ]);

        request()->photo->storeAs('images', 'optimized.jpg');

        // Session::put('success', 'Your Image Successfully Optimize');

        return redirect()->back();
    }
}
