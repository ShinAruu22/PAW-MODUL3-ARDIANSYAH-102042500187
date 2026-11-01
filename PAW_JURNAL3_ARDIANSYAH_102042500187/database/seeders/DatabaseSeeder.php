<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun Pengguna LMS (Dosen) - TODO 1
        $dosen = User::updateOrCreate(
            ['email' => 'budi@telkom.ac.id'], 
            [
                'name' => 'Dr. Ir. Budi Santoso, M.T.',
                'password' => bcrypt('pakdosen'),
                'role' => 'dosen',
                'nomor_induk' => '1122334455'
            ]
        );

        // 2. Akun Pengguna LMS (Mahasiswa)
        $mahasiswa = User::updateOrCreate(
            ['email' => 'raihan@telkom.ac.id'],
            [
                'name' => 'Ahmad Raihan Arifinza',
                'password' => bcrypt('nakmhs'),
                'role' => 'mahasiswa',
                'nomor_induk' => '1202220022' // Isi sesuai ketentuan, jika ada
            ]
        );

        // 3. Data Awal Mata Kuliah
        $mk = \App\Models\MataKuliah::updateOrCreate(
            ['kode_mk' => 'CII3B4'],
            [
                'nama_mk' => 'Pengembangan Aplikasi Website',
                'sks' => 4,
                'kelas' => 'SI-46-01',
                'deskripsi' => 'Mata kuliah pengembangan aplikasi web menggunakan framework Laravel.',
                'dosen_id' => $dosen->id,
            ]
        );
    }
}