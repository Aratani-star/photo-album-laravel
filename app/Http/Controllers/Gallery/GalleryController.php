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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif', // adjust size and types
        ]);

        // Store the image file
        $path = $request->file('image')->store('images', 'public'); // Store in the "images" folder

        // Save image info to the database (optional)
        $image = new Image();
        $image->url = $path;
        $image->name = "Upload";
        $image->description = "Uploaded Image";
        $image->created_at = 0;
        $image->updated_at = 0;
        $image->save();
        $full_url = url($path);
        return response()->json(['image' => $full_url], 200);
    }
}

/**
 * SQLSTATE[42S22]: Column not found: 1054 Unknown column 'updated_at' in 'field list' 
 * (Connection: mysql, SQL: insert into `images` (`url`, `name`, `description`, `created_at`, `updated_at`) values (images/TokZomhuDEHbR2cCg6ex150UXdcIlqc6oj89fenz.jpg, Upload, Uploaded Image, 0, 0))
 */