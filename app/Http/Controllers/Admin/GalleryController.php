<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Spatie\ImageOptimizer\OptimizerChainFactory;

use App\Models\Album;
use App\Models\Image;

class GalleryController extends Controller
{
    public function manage()
    {
        $albums = Album::all();
        return view('admin.gallery', compact('albums'));
    }

    public function displayAddAlbumPanel()
    {
        return view('admin.add_album');
    }

    public function createAlbum(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'album_name' => 'required',
            'album_description' => 'required',
            'visibility' => 'required',
        ]);

        $album = new Album();
        $album->name = $request->album_name;
        $album->description = $request->album_description;
        $album->visibility = $request->visibility ? 1 : 0;
        $album->save();

        return redirect()->route('admin.manage_gallery')->with('msg', 'Album created successfully.');
    }

    public function displayEditAlbumPanel($id)
    {
        $album = Album::find($id);

        if ($album) {
            // dd($album);
            return view('admin.edit_album', ['album' => $album]);
        } else {
            return redirect()->back()->with('msg', 'Album not found!');
        }
    }

    public function editAlbum(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'album_name' => 'required',
            'album_description' => 'required',
            'visibility' => 'required',
        ]);

        $album = Album::find($request->album_id);
        $album->name = $request->album_name;
        $album->description = $request->album_description;
        $album->visibility = $request->visibility ? 1 : 0;
        $album->save();

        return redirect()->route('admin.manage_gallery')->with('msg', 'Album updated successfully.');
    }

    public function getAlbum($id)
    {
        $album = Album::with('images')->find($id);
        return view('admin.album', ['album' => $album]);
    }

    public function deleteAlbum(Request $request)
    {
        $album = Album::find($request->album_id);
        if ($album) {
            foreach ($album->images as $image) {
                Storage::delete($image->url);
                $image->delete();
            }
            $album->delete();
            return redirect()->back()->with('msg', 'Album deleted successfully.');
        } else {
            return redirect()->back()->with('msg', 'Album not found!');
        }
    }

    public function displayAddImagePanel()
    {
        $albums = Album::all();
        return view('admin.add_image', compact('albums'));
    }

    public function addImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'album_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = new Image();
        $image->album = $request->album_id;
        $image->caption = $request->caption;
        
        if($request->hasFile('image')){
            $path = $request->image->store('public/uploaded_img');
            $image->url = $path;
            $pathToImage = Storage::path($path);
            $optimizer = OptimizerChainFactory::create();
            $optimizer->optimize($pathToImage);
        } else {
            return redirect()->back()->with('msg','Failed to upload photo');
        }

        $image->save();

        return redirect()->back()->with('msg', 'Image added successfully.');
    }

    public function displayEditImagePanel($id)
    {
        $image = Image::with('album')->find($id);
        // dd($image->toArray()['album']['name']);
        $albums = Album::all();

        if ($image) {
            return view('admin.edit_image', ['image' => $image], ['albums' => $albums]);
        } else {
            return redirect()->back()->with('msg', 'Image not found!');
        }
    }

    public function editImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'album_id' => 'required|exists:albums,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if(!$validator) return back()->with('msg', 'Validation failed.');

        // dd($request->album_id);
        $image = Image::findOrFail($request->image_id);
        // dd($image);
        $image->album = $request->album_id;
        $image->caption = $request->caption;
        
        if($request->hasFile('image')){
            $path = $request->image->store('public/uploaded_img');
            $image->url = $path;
            $pathToImage = Storage::path($path);
            $optimizer = OptimizerChainFactory::create();
            $optimizer->optimize($pathToImage);
        } else {
            return redirect()->back()->with('msg','Failed to upload photo');
        }

        $image->update();

        return redirect()->route('admin.album.images', $request->album_id)->with('msg', 'Image edited successfully.');
    }

    public function deleteImage(Request $request)
    {
        $image = Image::find($request->image_id);
        
        if($image) {
            $image->delete();
            return redirect()->back()->with('msg', 'Image deleted successfully.');
        } else {
            return redirect()->back()->with('msg', 'Image not found!');
        }
    }
}
