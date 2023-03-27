<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrintRekapUkuranController extends Controller
{
    public function index()
    {
        return view('print.rekap-ukuran');
    }
}
