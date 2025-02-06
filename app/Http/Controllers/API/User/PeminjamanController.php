<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::where('user_id', Auth::user()->id)->get();

        $data = [];
        foreach ($peminjamans as $p) {
            $datas['id'] = $p->id;
            $datas['user'] = $p->user->fullname;
            $datas['buku'] = $p->buku->judul;
            $datas['tanggal_peminjaman'] = $p->tanggal_peminjaman;
            $datas['tanggal_pengembalian'] = $p->tanggal_pengembalian ?? '-';
            $datas['kondisi_buku_saat_dipinjam'] = $p->kondisi_buku_saat_dipinjam;
            $datas['kondisi_buku_saat_dikembalikan'] = $p->kondisi_buku_saat_dikembalikan ?? '-';
            $datas['denda'] = $p->denda ?? '-';
            $data[] = $datas;
        }

        return response()->json([
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        $cek = Peminjaman::where('user_id', Auth::user()->id)->where('buku_id', $request->buku_id)->where('kondisi_buku_saat_dikembalikan', null)->first();

        if ($cek == null) {
            $buku = Buku::find($request->buku_id);
            if ($request->kondisi_buku_saat_dipinjam == 'baik') {
                if ($buku->j_buku_baik > 0) {
                    $data = [];

                    $peminjaman = Peminjaman::create([
                        'buku_id' => $request->buku_id,
                        'user_id' => Auth::user()->id,
                        'tanggal_peminjaman' => date('Y-m-d'),
                        'kondisi_buku_saat_dipinjam' => 'baik',
                    ]);
                    $buku->update([
                        'j_buku_baik' => $buku->j_buku_baik - 1
                    ]);

                    $datas['id'] = $peminjaman->id;
                    $datas['user'] = $peminjaman->user->fullname;
                    $datas['buku'] = $peminjaman->buku->judul;
                    $datas['tanggal_peminjaman'] = $peminjaman->tanggal_peminjaman;
                    $datas['kondisi_buku_saat_dipinjam'] = $peminjaman->kondisi_buku_saat_dipinjam;
                    $data[] = $datas;

                    return response()->json([
                        'message' => 'Sukses Menambahkan Peminjaman',
                        'data' => $data
                    ]);
                } else {
                    return response()->json([
                        'message' => 'Gagal Menambahkan Peminjaman',
                    ], 400);
                }

            } else if ($request->kondisi_buku_saat_dipinjam == 'rusak') {
                if ($buku->j_buku_rusak > 0) {
                    $peminjaman = Peminjaman::create([
                        'user_id' => Auth::user()->id,
                        'buku_id' => $request->buku_id,
                        'tanggal_peminjaman' => date('Y-m-d'),
                        'kondisi_buku_saat_dipinjam' => 'rusak',
                    ]);
                    $buku->update([
                        'j_buku_rusak' => $buku->j_buku_rusak - 1
                    ]);
                    $datas['id'] = $peminjaman->id;
                    $datas['user'] = $peminjaman->user->fullname;
                    $datas['buku'] = $peminjaman->buku->judul;
                    $datas['tanggal_peminjaman'] = $peminjaman->tanggal_peminjaman;
                    $datas['kondisi_buku_saat_dipinjam'] = $peminjaman->kondisi_buku_saat_dipinjam;
                    $data[] = $datas;

                    return response()->json([
                        'message' => 'Sukses Menambahkan Peminjaman',
                        'data' => $data
                    ]);
                } else {
                    return response()->json([
                        'message' => 'Gagal Menambahkan Peminjaman',
                    ], 400);
                }
            }
        }
        return response()->json([
            'message' => 'Gagal Menambahkan Peminjaman',
        ], 400);
    }
}
