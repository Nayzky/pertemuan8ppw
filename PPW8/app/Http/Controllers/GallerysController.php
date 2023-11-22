<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class GallerysController extends Controller
{
    public function index()
    {
        $galleries = Gallery::whereNotNull('image_url')->get();
        return view('gallery', compact('galleries'));
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();  
            $request->image->move(public_path('images'), $imageName);

            Gallery::create([
                'title' => $request->title,
                'image_url' => 'images/' . $imageName,
                'description' => $request->description,
            ]);

            return redirect('/gallery')->with('success', 'Image uploaded successfully');
        }

        return redirect('/gallery')->with('error', 'Failed to upload image');
    }
}
