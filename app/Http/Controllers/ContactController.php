<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // Simpan data dari form
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'company' => 'nullable|string|max:255',
            'budget' => 'nullable|string|max:255',
            'services' => 'nullable|array',
            'message' => 'required|string',
            'rating' => 'nullable|integer|min:1|max:5',
        ]);

        Contact::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'company' => $validated['company'] ?? null,
            'budget' => $validated['budget'] ?? null,
            'services' => $validated['services'] ?? null,
            'message' => $validated['message'],
            'rating' => $validated['rating'] ?? null,
        ]);

        return back()->with('success', 'Pesan berhasil dikirim! Terima kasih telah menghubungi kami.');
    }

    // Tampilkan semua contact di halaman admin
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('admin.contacts', compact('contacts'));
    }

    // Optional: lihat detail contact
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.contact-detail', compact('contact'));
    }
}