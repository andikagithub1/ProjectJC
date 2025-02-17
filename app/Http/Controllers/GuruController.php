<?php
// GuruController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    // Menampilkan halaman utama Guru
    public function index()
    {
        return view('guru.index');
    }

    // Menampilkan halaman profil Guru
    public function profile()
    {
        return view('guru.profile');
    }

    // Menangani pembaruan profil Guru
    public function update(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'experience' => 'required|integer|min:1',
        ]);

        // Logika untuk menyimpan data (misalnya di database atau session)
        session([
            'guru_name' => $validated['name'],
            'guru_subject' => $validated['subject'],
            'guru_experience' => $validated['experience'],
        ]);

        // Redirect kembali ke halaman profil dengan pesan sukses
        return redirect()->route('guru.profile')->with('success', 'Profil berhasil diperbarui!');
    }

    // Menampilkan halaman pengaturan Guru
    public function settings()
    {
        return view('guru.settings');
    }
}
