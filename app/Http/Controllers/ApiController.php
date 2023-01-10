<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function usersKodeDaftar(Request $request): Collection
    {
        return User::query()
            ->role('Calon Siswa')
            ->select('id', 'kode_daftar', 'name')
            ->orderBy('kode_daftar')
            ->when(
                $request->search,
                fn (Builder $query) => $query
                    ->where('kode_daftar', 'like', "%{$request->search}%")
                    ->orWhere('name', 'like', "%{$request->search}%")
                    ->where('kode_daftar', '!=', '')
            )
            ->get();
    }

    public function usersDiterima(Request $request): Collection
    {
        return User::query()
            ->role('Calon Siswa')
            ->whereDiterima('diterima')
            ->select('id', 'kode_daftar', 'name')
            ->orderBy('kode_daftar')
            ->when(
                $request->search,
                fn (Builder $query) => $query
                    ->where('kode_daftar', 'like', "%{$request->search}%")
                    ->orWhere('name', 'like', "%{$request->search}%")
                    ->whereDiterima('diterima')
            )
            ->get();
    }
}
