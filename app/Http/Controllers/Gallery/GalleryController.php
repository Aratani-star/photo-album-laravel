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
use App\Domain\Image\WorkFlows\ImageWorkflow;

class GalleryController extends Controller
{   
    /**
     * Show the user's profile settings page.
     */
    public function __construct(
        private ImageWorkflow $workflow,
    ) {
    }
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
     

        $image = $request->file('image');

        // Store the image file

        $this->workflow->uploadImage($image);
    
        // Save image info to the database (optional)
        
    
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
