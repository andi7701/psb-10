<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PrintController extends Controller
{

    public function formulir_pendaftaran(User $user)
    {
        $user->load([
            'alamat' => [
                'province',
                'city',
                'district',
                'village',
            ],
            'biodata',
            'orangTua',
            'sekolahSd' => [
                'province',
                'city',
                'district',
                'village',
            ],
            'sekolahAsal' => [
                'province',
                'city',
                'district',
                'village',
            ],
            'wali'
        ]);
        return view(
            'print.formulir-pendaftaran',
            [
                'user' => $user
            ]
        );
    }
}
