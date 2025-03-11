<?php

namespace App\Http\Controllers\Gallery;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\ProfileUpdateRequest;
use App\Models\Image;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;

class GalleryController extends Controller
{   
    /**
     * Show the user's profile settings page.
     */
    public function get(Request $request): Response
    {
        $images = DB::table('images')->get();
    
        $jsonString = json_encode($images);
        return Inertia::render('gallery', [
            'images' => $images
        ]);
    }

    public function upload(Request $request)
    {
        // Validate image
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|4096', // adjust size and types
        ]);
     
        // Store the image file
        $path = $request->file('image')->store('images', 'public'); // Store in the "images" folder
    
        // Save image info to the database (optional)
        $image = new Image();
        $image->url = $path;
        $image->name = "Upload";
        $image->description = "Uploaded Image";
        $image->save();
    
        return response()->json(['image' => $path], 200);
    }

    public function delete(Request $request)
    {
        $image = Image::find($request->id);
        $image->delete();
        return response()->json(['message' => 'Image deleted'], 200);
    }

    public function update(Request $request)
    {
        $image = Image::find($request->id);
        $image->name = $request->name;
        $image->description = $request->description;
        $image->save();
        return response()->json(['message' => 'Image updated'], 200);
    }

    public function download(Request $request)
    {
        $image = Image::find($request->id);
        return response()->download(storage_path('app/public/' . $image->url));
    }

    public function view(Request $request)
    {
        $image = Image::find($request->id);
        return response()->json(['image' => $image], 200);
    }

    public function edit(Request $request)
    {
        $image = Image::find($request->id);
        return response()->json(['image' => $image], 200);
    }
}
