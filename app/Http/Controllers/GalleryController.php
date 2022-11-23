<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Album;

class GalleryController extends Controller
{
    public function index()
    {
        $albums = Album::where('visibility', 1)->get();
        $images = Image::where('visibility', 1)->get();

        return view('gallery',
            ['albums' => $albums],
            ['images' => $images],
        );
    }

    public function search(Request $request)
    {
        $images = Image::where('album','LIKE','%'.$request->q.'%')->where('visibility', 1)->get();

        if($request->q == 0){
            $images = Image::all();
        }


        return response()->json([
            'results' => $images
        ]);
    }
}
