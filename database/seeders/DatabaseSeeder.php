<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\Identitas;
use App\Models\Kategori;
use App\Models\Peminjaman;
use App\Models\Penerbit;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'kode' => 'SA001',
            'fullname' => 'Admin Satu',
            'username' => 'Admin',
            'password' => Hash::make('Admin123'),
            'role' => 'admin',
            'foto' => '',
            'verif' => 'verified',
            'foto' => '/assets/images/faces/2.jpg'
        ]);
        User::create([
            'kode' => 'AA001',
            'nis' => '112233',
            'fullname' => 'Aldy Revigustian',
            'username' => 'Aldy',
            'password' => Hash::make('Aldy123'),
            'kelas' => 'XII RPL',
            'alamat' => 'Bukdur',
            'role' => 'user',
            'join_date' => date('Y-m-d H:i:s'),
            'foto' => '',
            'verif' => 'verified',
            'foto' => '/assets/images/faces/1.jpg'
        ]);

        User::create([
            'kode' => 'AA002',
            'nis' => '445566',
            'fullname' => 'Revigustian Aldy',
            'username' => 'Revigustian',
            'password' => Hash::make('Revi123'),
            'kelas' => 'XII RPL',
            'alamat' => 'Bukdur',
            'role' => 'user',
            'join_date' => date('Y-m-d H:i:s'),
            'foto' => '',
            'verif' => 'verified',
            'foto' => '/assets/images/faces/1.jpg'
        ]);

        Kategori::create([
            'kode' => 'KK001',
            'nama' => 'Umum'
        ]);
        Kategori::create([
            'kode' => 'KK002',
            'nama' => 'Sains'
        ]);
        Kategori::create([
            'kode' => 'KK003',
            'nama' => 'Sejarah'
        ]);

        Penerbit::create([
            'kode' => 'PP001',
            'nama' => 'Erlangga',
            'verif' => 'verified'
        ]);
        Penerbit::create([
            'kode' => 'PP002',
            'nama' => 'Bukunesia',
            'verif' => 'verified'
        ]);
        Penerbit::create([
            'kode' => 'PP003',
            'nama' => 'Gramedia',
            'verif' => 'verified'
        ]);


        Buku::create([
            'judul' => 'Cara Membersihkan Mobil',
            'kategori_id' => 1,
            'penerbit_id' => 1,
            'pengarang' => 'Aldy',
            'tahun_terbit' => '2022',
            'isbn' => '112233',
            'j_buku_baik' => 40,
            'j_buku_rusak' => 15,
            'foto' => '/assets/images/samples/building.jpg'
        ]);
        Buku::create([
            'judul' => 'Penelitian Sains',
            'kategori_id' => 2,
            'penerbit_id' => 2,
            'pengarang' => 'Aldy BudiAsih',
            'tahun_terbit' => '2022',
            'isbn' => '223344',
            'j_buku_baik' => 20,
            'j_buku_rusak' => 5,
            'foto' => '/assets/images/samples/building.jpg'
        ]);
        Buku::create([
            'judul' => 'Sejarah terbentuknya SMKN10',
            'kategori_id' => 3,
            'penerbit_id' => 3,
            'pengarang' => 'Aldy YGY',
            'tahun_terbit' => '2022',
            'isbn' => '556677',
            'j_buku_baik' => 30,
            'j_buku_rusak' => 10,
            'foto' => '/assets/images/samples/building.jpg'
        ]);

        Peminjaman::create([
            'buku_id' => 1,
            'user_id' => 2,
            'tanggal_peminjaman' => '2023-01-01',
            'tanggal_pengembalian' => '2023-01-10',
            'kondisi_buku_saat_dipinjam' => 'baik',
            'kondisi_buku_saat_dikembalikan' => 'baik',
            'denda' => 0,
        ]);

        Peminjaman::create([
            'buku_id' => 2,
            'user_id' => 3,
            'tanggal_peminjaman' => '2023-01-01',
            'kondisi_buku_saat_dipinjam' => 'baik',
        ]);

        Peminjaman::create([
            'buku_id' => 3,
            'user_id' => 2,
            'tanggal_peminjaman' => '2023-01-01',
            'kondisi_buku_saat_dipinjam' => 'baik',
        ]);

        Identitas::create([
            'nama_app' => 'E-Perpus SMKN 10',
            'alamat_app' => 'Jl. Mayjen Sutoyo, Daerah Khusus Ibukota Jakarta 13630',
            'email_app' => 'smkn10@perpus.com',
            'nomor_telepon' => '081219019667',
            'foto' => '/assets/images/logo/logo.png'
        ]);
    }
}
