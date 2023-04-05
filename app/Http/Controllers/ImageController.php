<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ImageController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
        $this->authorizeResource(Image::class);
    }

    public function index() {

        $images = Image::visibleFor(request()->user())->latest()->paginate(15)->withQueryString();

        return view('image.index', compact('images'));
    }


    // public function show(Image $image) {
    //     return view('image.show', compact('image'));
    // }

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
        // if(!Gate::allows('update-image', $image)){
        //     abort(403, "Access denied");
        // }

        // if(request()->user()->cannot('update', $image)) {
        //     abort(403, "Access denied");
        // }

        // $this->authorize('update', $image);

        return view('image.edit', compact('image'));
    }

    public function update(Image $image, ImageRequest $request){
        $image->update($request->getData());
        return to_route('images.index')->with('message', "Images has been updated successfully");
    }

    public function destroy(Image $image){
        // if(Gate::denies('delete', $image)){
        //     abort(403, "Access denied");
        // }

        $image->delete();
        return to_route('images.index')->with('message', "Images has been removed successfully");
    }
}
