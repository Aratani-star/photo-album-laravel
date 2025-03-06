<?php

namespace App\Http\Controllers\Gallery;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\ProfileUpdateRequest;
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
        // return Inertia::render('profile/', [
        //     'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
        //     'status' => $request->session()->get('status'),
        // ]);
    }

    /**
     * Update the user's profile settings.
     */
    public function create(ProfileUpdateRequest $request): RedirectResponse
    {
        return redirect('/');
    }

    /**
     * Delete the user's account.
     */
    public function update(Request $request): RedirectResponse
    {
        return redirect('/');
    }
}