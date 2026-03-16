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
        Frame::create([
            'nama_frame' => $request->nama_frame,
            'jurusan' => $request->jurusan,
            'gambar_frame' => $request->gambar_frame,
            'harga' => $request->harga
        ]);

        return redirect('/frame')->with('success','Frame berhasil ditambahkan');
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
