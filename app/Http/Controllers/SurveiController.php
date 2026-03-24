<?php

namespace App\Http\Controllers;

use App\Models\Survei;
use Illuminate\Http\Request;

class SurveiController extends Controller
{
    // =========================
    // SIMPAN SURVEI
    // =========================
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'rating' => 'required|integer|min:1|max:5',
            'pesan' => 'nullable'
        ]);

        Survei::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'rating' => $request->rating,
            'pesan' => $request->pesan
        ]);

        return redirect('/')
            ->with('success', 'Terima kasih atas feedback anda 🙌');
    }

    // =========================
    // ADMIN: LIHAT HASIL SURVEI
    // =========================
    public function index()
    {
        $data = Survei::latest()->get();
        return view('admin.survei', compact('data'));
    }
}