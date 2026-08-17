<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            ->paginate(15)
            ->withQueryString();

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

    public function show(Request $request, int $user): View
    {
        abort_unless($request->user()?->role === 'admin', 403);

        // Ambil data siswa
        $student = DB::table('users')
            ->where('users.id', $user)
            ->where('users.role', 'siswa')
            ->first();

        // Jika siswa tidak ditemukan
        abort_unless($student, 404);

        /*
        |--------------------------------------------------------------------------
        | Ambil seluruh aktivitas siswa
        |--------------------------------------------------------------------------
        */
        $activities = DB::table('attempts')
            ->leftJoin('modules', 'modules.id', '=', 'attempts.module_id')
            ->where('attempts.user_id', $student->id)
            ->where('attempts.status', 'selesai')
            ->select([
                'attempts.id',
                'attempts.nilai',
                'attempts.selesai_pada',
                'modules.judul',
                'modules.kategori',
            ])
            ->orderByDesc('attempts.selesai_pada')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Kategori aktivitas
        |--------------------------------------------------------------------------
        */
        $kategoriMap = [
            'materi' => 'Materi',
            'simulasi_horen' => 'Simulasi Hören',
            'simulasi_lesen' => 'Simulasi Lesen',
            'simulasi_schreiben' => 'Simulasi Schreiben',
            'simulasi_sprechen' => 'Simulasi Sprechen',
        ];

        /*
        |--------------------------------------------------------------------------
        | Total latihan dan simulasi
        |--------------------------------------------------------------------------
        */
        $totalLatihan = $activities
            ->where('kategori', 'materi')
            ->count();

        $totalSimulasi = $activities
            ->filter(function ($activity) {
                return in_array($activity->kategori, [
                    'simulasi_horen',
                    'simulasi_lesen',
                    'simulasi_schreiben',
                    'simulasi_sprechen',
                ]);
            })
            ->count();

        /*
        |--------------------------------------------------------------------------
        | Nilai rata-rata keseluruhan
        |--------------------------------------------------------------------------
        */
        $nilaiActivities = $activities->filter(function ($activity) {
            return $activity->nilai !== null;
        });

        $nilaiRataRata = $nilaiActivities->count()
            ? round($nilaiActivities->avg('nilai'), 1)
            : null;

        /*
        |--------------------------------------------------------------------------
        | Ringkasan masing-masing kategori
        |--------------------------------------------------------------------------
        */
        $categorySummaries = [];

        foreach ($kategoriMap as $kategori => $label) {

            $kategoriActivities = $activities->filter(function ($activity) use ($kategori) {
                return $activity->kategori === $kategori;
            });

            $nilaiKategori = $kategoriActivities->filter(function ($activity) {
                return $activity->nilai !== null;
            });

            $categorySummaries[$kategori] = [
                'label' => $label,
                'selesai' => $kategoriActivities->count(),
                'rata_rata' => $nilaiKategori->count()
                    ? round($nilaiKategori->avg('nilai'), 1)
                    : null,
            ];
        }

        /*
        |--------------------------------------------------------------------------
        | Status nilai keseluruhan
        |--------------------------------------------------------------------------
        */
        if ($nilaiRataRata === null) {
            $nilaiStatus = 'Belum Dinilai';
        } elseif ($nilaiRataRata >= 90) {
            $nilaiStatus = 'Sangat Baik';
        } elseif ($nilaiRataRata >= 80) {
            $nilaiStatus = 'Baik';
        } elseif ($nilaiRataRata >= 70) {
            $nilaiStatus = 'Cukup';
        } else {
            $nilaiStatus = 'Perlu Ditingkatkan';
        }

        return view('pages.admin-siswa-detail', compact(
            'student',
            'activities',
            'totalLatihan',
            'totalSimulasi',
            'nilaiRataRata',
            'nilaiStatus',
            'categorySummaries'
        ));
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
