<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index() {

        $images = Image::published()->latest()->paginate(15)->withQueryString();

        return view('image.index', compact('images'));
    }


    public function show(Image $image) {
        return view('image.show', compact('image'));
    }

    public function create() {
        return view('image.create');
    }

    public function store(ImageRequest $request)
    {
        // dd(request()->user()->id, $request->getData());
        Image::create($request->getData());
        return to_route('images.index')->with('message', "Images has been uploaded successfully");
    }

    public function edit(Image $image) {
        // dd(request()->user()->id, $image->user_id);
        if(!request()->user() || (request()->user()->id  !== $image->user_id)){
            abort(403, "Access denied");
        }

        return view('image.edit', compact('image'));
    }

    public function update(Image $image, ImageRequest $request){
        $image->update($request->getData());
        return to_route('images.index')->with('message', "Images has been updated successfully");
    }

    public function destroy(Image $image){
        if(!request()->user() || (request()->user()->id  !== $image->user_id)){
            abort(403, "Access denied");
        }

        $image->delete();
        return to_route('images.index')->with('message', "Images has been removed successfully");
    }
}
