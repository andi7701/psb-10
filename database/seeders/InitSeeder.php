<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class InitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'Admin',
            'Kepala Sekolah',
            'Ketua Tim',
            'Tim',
            'Calon Siswa'
        ];

        foreach ($roles as $role) {
            Role::create([
                'name' => $role
            ]);
        }
        $taqi = User::create([
            'name' => 'Taqius Shofi Albastomi,S.Kom',
            'username' => 'taqi',
            'password' => bcrypt('asdfasdf'),
        ]);
        $taqi->assignRole('Admin');

        $khalim = User::create([
            'name' => 'Abdul Khalim,S.Pd.',
            'username' => 'khalim',
            'password' => bcrypt('12345678'),
        ]);
        $khalim->assignRole('Kepala Sekolah');

        $fathur = User::create([
            'name' => 'Fathurrohman,S.Pd.',
            'username' => 'fathur',
            'password' => bcrypt('12345678'),
        ]);
        $fathur->assignRole('Ketua Tim');

        $list_siswa = [
            [
                'name' => 'Siswa Baru Putra 1',
                'kode_daftar' => 'A0001'
            ],
            [
                'name' => 'Siswa Baru Putra 2',
                'kode_daftar' => 'A0002'
            ],
            [
                'name' => 'Siswa Baru Putra 3',
                'kode_daftar' => 'A0003'
            ],
            [
                'name' => 'Siswa Baru Putri 1',
                'kode_daftar' => 'B0001'
            ],
            [
                'name' => 'Siswa Baru Putri 2',
                'kode_daftar' => 'B0002'
            ],
            [
                'name' => 'Siswa Pindah Putri 1',
                'kode_daftar' => 'D0001'
            ],
        ];

        foreach ($list_siswa as $siswa) {
            $calonSiswa = User::create(
                [
                    'name' => $siswa['name'],
                    'kode_daftar' => $siswa['kode_daftar'],
                    'password' => bcrypt('12345678910')
                ]
            );
            $calonSiswa->assignRole('Calon Siswa');
        }
    }
}
