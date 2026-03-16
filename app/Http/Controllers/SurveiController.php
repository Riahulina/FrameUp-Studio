<?php
namespace App\Http\Controllers;
use App\Models\Survei;
use Illuminate\Http\Request;

class SurveiController extends Controller
{
    public function store(Request $request)
    {
        Survei::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'rating' => $request->rating,
            'pesan' => $request->pesan
        ]);

        return redirect('/')->with('success','Terima kasih atas feedback anda');
    }

    public function index()
    {
        $data = Survei::all();
        return view('admin.survei', compact('data'));
    }
}