<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $files = File::all();
        return view('file.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('file.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        //cek id
        $id = Auth::user()->id;

        //validate
        $soundFile = $request->validate([
            'name' => 'required',
            // 'type' => 'required',
            'file' => 'nullable|mimes:audio/mpeg,mpga,mp3,wav,aac',
        ]);

        //beri nama
        $file = $request->file('file');
        $file_name = $id . '-user' . '-' . time() . '-' . $file->getClientOriginalName();

        // simpan di folder public
        $request->file('file')->move(public_path('sound-file'), $file_name);

        // simpan di folder storage
        // $request->file('file')->storeAs('public/sound-file', $file_name);

        //masukkan ke array validate
        $soundFile['file'] = $file_name;
        // $soundFile['user_id'] = $id;

        //simpan ke database
        File::create($soundFile);

        return redirect()->route('file.index')->with('success', 'Berhasil upload dokumen');
    }

    /**
     * Display the specified resource.
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        //
    }
}
