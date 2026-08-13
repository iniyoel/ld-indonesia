<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\ActivityLog;


class ModuleController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DAFTAR MODUL
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $modules = Module::with('creator')
            ->latest()
            ->paginate(10);

        return view('pages.admin-modul-pembelajaran', compact('modules'));
    }


    /*
    |--------------------------------------------------------------------------
    | FORM TAMBAH MODUL
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('pages.admin-modul-form');
    }


    /*
    |--------------------------------------------------------------------------
    | SIMPAN MODUL
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => [
                'required',
                'string',
                'max:255',
            ],

            'deskripsi' => [
                'required',
                'string',
            ],

            'level' => [
                'required',
                'in:A1,A2,B1,B2',
            ],

            'kategori' => [
                'required',
                'in:materi,simulasi_horen,simulasi_lesen,simulasi_schreiben,simulasi_sprechen',
            ],

            'file' => [
                'nullable',
                'file',
                'mimes:pdf',
                'max:10240',
                'required_if:kategori,materi',
            ],

            'teks_bacaan' => [
                'nullable',
                'string',
                'required_if:kategori,simulasi_lesen',
            ],

            'topik_sprechen' => [
                'nullable',
                'string',
                'required_if:kategori,simulasi_sprechen',
            ],
        ]);

        $module = new Module();

        $module->judul = $validated['judul'];
        $module->deskripsi = $validated['deskripsi'];
        $module->level = $validated['level'];
        $module->kategori = $validated['kategori'];

        $module->teks_bacaan = $validated['teks_bacaan'] ?? null;
        $module->topik_sprechen = $validated['topik_sprechen'] ?? null;

        $module->dibuat_oleh = Auth::id();
        $module->diperbarui_oleh = Auth::id();

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $path = $file->store('modules', 'public');

            $module->file_path = $path;
            $module->file_type = $file->getMimeType();
        }

        $module->save();

        ActivityLog::create([
            'user_id' => Auth::id(),
            'aksi' => 'tambah',
            'target_table' => 'modules',
            'target_id' => $module->id,
            'deskripsi' => 'Menambahkan modul "' . $module->judul . '"',
            'metadata' => [
                'kategori' => $module->kategori,
                'level' => $module->level,
            ],
        ]);

        return redirect()
            ->route('modul.index')
            ->with('success', 'Modul berhasil ditambahkan.');
    }
}