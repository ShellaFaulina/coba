<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Kategori;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MenuCtr extends Controller
{
    public function menu()
    {
        $kategoris = Kategori::all();
        $title = "INDEX";
        $image = $kategoris->map(function ($kategori) {
        return Storage::url($kategori->image);
    });
        return view('main.menu', ['kategoris' => $kategoris, 'title' => $title, 'images' => $images]);
    }

    public function index()
    {
        $kategoris = Kategori::all();
        $title = "INDEX";
        $images = $kategoris->map(function ($kategori) {
        return Storage::url($kategori->image);
    });

    return view('kategoris.index', ['kategoris' => $kategoris, 'title' => $title, 'images' => $images]);
    }


    public function create()
    {
        return view('kategoris.create');
    }

    public function store(Request $request)
    {
        // Validasi form
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan foto ke dalam direktori storage
        $path = $request->file('image')->store('images', 'public');

        // Simpan data ke dalam database
        $kategori = new Menu();
        $kategori->title = $request->title;
        $kategori->description = $request->description;
        $kategori->photo = $path; // Sesuaikan dengan nama kolom yang sesuai di tabel Anda
        $kategori->save();

        // Redirect dengan pesan sukses jika diperlukan
        return redirect('/kategoris')->with('success', 'Menu berhasil dibuat!');
    }

    public function show($id)
    {
        $kategori = Kategori::findOrFail($id);
        $image = Storage::url($kategori->image);
        return view('kategoris.show', ['kategori' => $kategori, 'image' => $image]);
    }

    public function edit($id)
    {
        $kategori = Kategori::find($id);
            return view('kategoris.edit', ['kategoris'=>$kategori]);
    }

    public function search(Request $request)
    {
        //
        $title = "Search Results";
        $query = $request->input('q');
        $kategoris = Kategori::where('title', 'like', "%$query%")->get();
        return view('kategoris.search', compact('title', 'kategoris', 'query'));
    }

    public function mainsearch(Request $request)
    {
        //
        $title = "Search Results";
        $query = $request->input('q');
        $kategoris = kategori::where('title', 'like', "%$query%")->get();
        return view('main.search', compact('title', 'kategoris', 'query'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $kategori = Kategori::find($id);

        $kategori->name = $request->name;
        $kategori->description = $request->description;

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if (file_exists(storage_path("app/public/{$kategori->image}"))) {
                unlink(storage_path("app/public/{$kategori->image}"));
            }

            // Simpan gambar baru
            $imagePath = $request->file('image')->storePublic('image', 'public');
            $kategori->image = $imagePath;
        }

        $kategori->save();

        return redirect('/kategoris')->with('success', 'Kategori updated successfully!');
    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect('/kategoris')->with('success', 'Kategori deleted successfully!');
    }

    public function layout()
    {
        $user_id = auth()->user()->id;
        
        $dash = null;
        if (auth()->check()) {
            if (auth()->user()->roleid === 1) {
                // Admin
                $kategoris = Kategori::where('status_menu', 2)->get();
                $dash = "main.admindash";
            } elseif (auth()->user()->roleid === 2) {
                // Member
                $kategoris = Kategori::where('user_id', $user_id)->get();
                $dash = "main.memberdash";
            } else {
                // Other roles or default layout
                //$dash = 'main.defaultLayout';
            }
        } else {
            // Guest
            //$dash = 'main.guestLayout';
        }
    
        return view('dashboard', compact('kategoris', 'dash', 'user_id'));
    }

public function user()
{
    return $this->belongsTo(User::class);
}

}
    
