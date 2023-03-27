<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PrintRekapUkuranController extends Controller
{
    public function index()
    {
        return view('print.rekap-ukuran', [
            'listUser' => User::whereDiterima('diterima')
                ->whereTerukur(true)
                ->with(['seragam', 'biodata', 'sekolahSd'])
                ->get()
        ]);
    }
}
