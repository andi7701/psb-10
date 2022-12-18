<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\Village;

class Alamat extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get the desa that owns the Alamat
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function desa(): BelongsTo
    {
        return $this->belongsTo(Village::class, 'code', 'desa')->withDefault();
    }

    /**
     * Get the desa that owns the Alamat
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(District::class, 'code', 'desa')->withDefault();
    }

    /**
     * Get the desa that owns the Alamat
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kabupaten(): BelongsTo
    {
        return $this->belongsTo(City::class, 'code', 'desa')->withDefault();
    }

    /**
     * Get the desa that owns the Alamat
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function provinsi(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'code', 'desa')->withDefault();
    }
}
