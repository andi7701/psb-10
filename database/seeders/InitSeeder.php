<?php

namespace Database\Seeders;

use App\Models\Ekstra;
use App\Models\User;
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
            'Pendaftaran',
            'Agama',
            'Akademik',
            'Wawancara',
            'Kesehatan',
            'Minat Bakat',
            'Ukur Seragam',
            'Pengumuman',
            'Calon Siswa',
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
        $fathur->assignRole('Admin');

        $imam = User::create([
            'name' => 'Imam Turmudi,S.E',
            'username' => 'imam',
            'password' => bcrypt('12345678')
        ]);
        $imam->assignRole('Admin');

        $iza = User::create([
            'name' => "Muh Syifa A'iza A'ista,S.Pd",
            'username' => 'iza',
            'password' => bcrypt('12345678')
        ]);
        $iza->assignRole('Pendaftaran');

        $roni = User::create([
            'name' => "Nurkhaeroni Alamul Huda,S.Ag",
            'username' => 'roni',
            'password' => bcrypt('12345678')
        ]);
        $roni->assignRole('Pendaftaran');

        $sahrul = User::create([
            'name' => "Sahrul Gufron",
            'username' => 'sahrul',
            'password' => bcrypt('12345678')
        ]);
        $sahrul->assignRole('Pendaftaran');

        $anis = User::create([
            'name' => "Anis Fitria,S.Pd",
            'username' => 'anis',
            'password' => bcrypt('12345678')
        ]);
        $anis->assignRole('Pengumuman');

        $yuni = User::create([
            'name' => "Sri Wahyuni,S.Pd",
            'username' => 'yuni',
            'password' => bcrypt('12345678')
        ]);
        $yuni->assignRole('Pengumuman');

        $mulasi = User::create([
            'name' => "Mulasi,S.Pd",
            'username' => 'mulasi',
            'password' => bcrypt('12345678')
        ]);
        $mulasi->assignRole('Ukur Seragam');

        $ria = User::create([
            'name' => "Ria Lestari,S.Pd",
            'username' => 'ria',
            'password' => bcrypt('12345678')
        ]);
        $ria->assignRole('Ukur Seragam');

        $muhlisin = User::create([
            'name' => "Muhlisin,S.Pd",
            'username' => 'muhlisin',
            'password' => bcrypt('12345678')
        ]);
        $muhlisin->assignRole('Agama');

        $zazuk = User::create([
            'name' => "Zazuk Asiqoh,S.Pd",
            'username' => 'zazuk',
            'password' => bcrypt('12345678')
        ]);
        $zazuk->assignRole('Agama');

        $rizky = User::create([
            'name' => "Rizky Purwati,S.Pd",
            'username' => 'rizky',
            'password' => bcrypt('12345678')
        ]);
        $rizky->assignRole('Akademik');

        $reni = User::create([
            'name' => "Reni Setiowati,S.Pd.,Gr.",
            'username' => 'reni',
            'password' => bcrypt('12345678')
        ]);
        $reni->assignRole('Akademik');

        $doni = User::create([
            'name' => "Doni Sunarko,S.Pd",
            'username' => 'doni',
            'password' => bcrypt('12345678')
        ]);
        $doni->assignRole('Wawancara');

        $siti = User::create([
            'name' => "Siti Mutmainah,S.Sos",
            'username' => 'imut',
            'password' => bcrypt('12345678')
        ]);
        $siti->assignRole('Wawancara');

        $hafidz = User::create([
            'name' => "Ahmad Hafidz H,M.A",
            'username' => 'hafidz',
            'password' => bcrypt('12345678')
        ]);
        $hafidz->assignRole('Kesehatan');

        $elis = User::create([
            'name' => "Rizka Elistanti,S.Pd",
            'username' => 'elis',
            'password' => bcrypt('12345678')
        ]);
        $elis->assignRole('Kesehatan');

        $ning = User::create([
            'name' => "Martiningrum,S.Ag.,M.M",
            'username' => 'ning',
            'password' => bcrypt('12345678')
        ]);
        $ning->assignRole('Minat Bakat');

        $tina = User::create([
            'name' => "Noor Agustina,S.Pd",
            'username' => 'tina',
            'password' => bcrypt('12345678')
        ]);
        $tina->assignRole('Minat Bakat');

        $ekstras = [
            'Pramuka',
            'Sepak Bola',
            'Voli',
            'Tilawah',
            'Tartil',
            'Club Bahasa Indonesia',
            'Club Bahasa Inggris',
            'KIR',
            'Club IPS',
            'Club Matematika',
            'Club Bahasa Jawa',
            'Club Bahasa Arab',
            'Tahfidz',
            'Kaligrafi',
            'Fiqih Ubudiyah',
            'Sepak Takraw',
            'Club Computer A',
            'Club Computer B',
        ];

        foreach ($ekstras as $ekstra) {
            Ekstra::create(
                [
                    'nama' => $ekstra
                ]
            );
        }
    }
}
