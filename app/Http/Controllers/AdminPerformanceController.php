<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPerformanceController extends Controller
{
    /**
     * Halaman Performa Siswa.
     *
     * Sumber data:
     * - users: akun siswa
     * - attempts: pengerjaan siswa
     * - modules: kategori modul yang dikerjakan
     *
     * Berdasarkan struktur aplikasi saat ini, kategori modul yang digunakan:
     * materi, simulasi_horen, simulasi_lesen, simulasi_schreiben,
     * simulasi_sprechen.
     */
    public function index(Request $request): View
    {
        abort_unless($request->user()?->role === 'admin', 403);

        $students = $this->studentPerformanceQuery()
            ->orderBy('users.name')
            ->get();

        return view('pages.admin-performa-siswa', compact('students'));
    }

    /**
     * Query performa seluruh siswa.
     *
     * Satu baris = satu siswa.
     * Semua pengerjaan yang berstatus "selesai" dihitung.
     */
    private function studentPerformanceQuery()
    {
        $completedAttempts = DB::table('attempts')
            ->where('attempts.status', 'selesai')
            ->whereColumn('attempts.user_id', 'users.id');

        $materiAttempts = (clone $completedAttempts)
            ->whereExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('modules')
                    ->whereColumn('modules.id', 'attempts.module_id')
                    ->where('modules.kategori', 'materi');
            });

        $simulationAttempts = (clone $completedAttempts)
            ->whereExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('modules')
                    ->whereColumn('modules.id', 'attempts.module_id')
                    ->whereIn('modules.kategori', [
                        'simulasi_horen',
                        'simulasi_lesen',
                        'simulasi_schreiben',
                        'simulasi_sprechen',
                    ]);
            });

        $averageScore = (clone $completedAttempts)
            ->whereNotNull('attempts.nilai');

        $lastActivity = (clone $completedAttempts);

        return DB::table('users')
            ->where('users.role', 'siswa')
            ->select([
                'users.id',
                'users.name',
                'users.level',
            ])
            ->selectSub(
                $materiAttempts->selectRaw('COUNT(*)'),
                'latihan_selesai'
            )
            ->selectSub(
                $simulationAttempts->selectRaw('COUNT(*)'),
                'simulasi_selesai'
            )
            ->selectSub(
                $averageScore->selectRaw('AVG(attempts.nilai)'),
                'nilai_rata_rata'
            )
            ->selectSub(
                $lastActivity->selectRaw('MAX(attempts.selesai_pada)'),
                'aktivitas_terakhir'
            );
    }

    /**
     * Endpoint data JSON.
     *
     * Bisa dipakai jika nanti halaman ingin mengambil data
     * secara AJAX tanpa reload.
     */
    public function data(Request $request)
    {
        abort_unless($request->user()?->role === 'admin', 403);

        $students = $this->studentPerformanceQuery()
            ->orderBy('users.name')
            ->get()
            ->map(function ($student) {
                return [
                    'id' => $student->id,
                    'nama' => $student->name,
                    'level' => $student->level,
                    'latihan_selesai' => (int) $student->latihan_selesai,
                    'simulasi_selesai' => (int) $student->simulasi_selesai,
                    'nilai_rata_rata' => $student->nilai_rata_rata !== null
                        ? round((float) $student->nilai_rata_rata, 2)
                        : null,
                    'aktivitas_terakhir' => $student->aktivitas_terakhir,
                ];
            });

        return response()->json([
            'success' => true,
            'total' => $students->count(),
            'data' => $students,
        ]);
    }
}
