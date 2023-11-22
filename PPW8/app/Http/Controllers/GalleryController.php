<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class GalleryController extends Controller
{
    public function index()
    {
        $data = array(
            'id' => "posts",
            'menu' => 'Gallery',
            'galleries' => Post::where('picture', '!=', '')->whereNotNull('picture')->orderBy('created_at', 'desc')->paginate(30)
        );
        return view('gallery.index')->with($data);
    }

    public function create()
    {
        return view('gallery.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
            'picture' => 'image|nullable|max:1999'
        ]);

        $filenameSimpan = 'noimage.png';

        if ($request->hasFile('picture')) {
            $filenameWithExt = $request->file('picture')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('picture')->getClientOriginalExtension();
            $basename = uniqid() . time();
            $filenameSimpan = "{$basename}.{$extension}";
            $path = $request->file('picture')->storeAs('public/posts_image', $filenameSimpan);
        }

        $post = new Post;
        $post->picture = $filenameSimpan;
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->save();

        return redirect('gallery')->with('success', 'Berhasil menambahkan data baru');
    }

    public function edit($id)
    {
        $gallery = Post::find($id);
        return view('gallery.edit')->with('gallery', $gallery);
    }

    public function update(Request $request, $id)
{
    $this->validate($request, [
        'title' => 'required|max:255',
        'description' => 'required',
        'picture' => 'image|nullable|max:1999'
    ]);

    $gallery = Post::find($id);
    $gallery->title = $request->input('title');
    $gallery->description = $request->input('description');

    if ($request->hasFile('picture')) {
        Storage::delete('posts_image/' . $gallery->picture);

        // Upload gambar yang baru
        $filenameWithExt = $request->file('picture')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('picture')->getClientOriginalExtension();
        $basename = uniqid() . time();
        $filenameToStore = "{$basename}.{$extension}";
        $path = $request->file('picture')->storeAs('posts_image', $filenameToStore);

        $gallery->picture = $filenameToStore;
    }

    $gallery->save();
    return redirect('gallery')->with('success', 'Gambar berhasil diperbarui');
}


public function destroy($id)
{
    $gallery = Post::find($id);

    if ($gallery) {
        Storage::delete('posts_image/' . $gallery->picture);
        $gallery->delete();
        return redirect()->back()->with('success', 'Gambar berhasil dihapus');
    }

    return redirect()->back()->with('error', 'Gambar tidak ditemukan');
}
}
