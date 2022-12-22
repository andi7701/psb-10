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
            ->select('id', 'kode_daftar')
            ->orderBy('kode_daftar')
            ->when(
                $request->search,
                fn (Builder $query) => $query
                ->where('kode_daftar', 'like', "%{$request->search}%")
            )
            ->get();
    }
}
