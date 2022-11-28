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
            'Tim '
        ];

        foreach($roles as $role)
        {
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
    }
}
