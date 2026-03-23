<?php


namespace App\Http\Controllers;

use App\Models\Frame;
use Illuminate\Http\Request;




class FrameController extends Controller
{
    public function index()
    {
        $frames = Frame::all();
        return view('frame.index', compact('frames'));
    }

    public function create()
    {
        return view('frame.create');
    }

    public function store(Request $request)
    {
        $file = $request->file('gambar_frame');

        $namaFile = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images'), $namaFile);

        Frame::create([
            'nama_frame' => $request->nama_frame,
            'jurusan' => $request->jurusan,
            'gambar_frame' => 'images/' . $namaFile,
            'harga' => $request->harga
        ]);

        return redirect('/frame')->with('success', 'Frame berhasil ditambahkan');
    }

    
    public function works()
    {
        $frames = Frame::all();
        return view('pages.works', compact('frames'));
    }
    public function destroy($id)
    {
        Frame::find($id)->delete();
        return redirect('/frame');
    }

    
}
