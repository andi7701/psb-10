<?php

namespace App\Models;

use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\Village;
use Illuminate\Database\Eloquent\Model;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SekolahSd extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get the user that owns the SekolahSd
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    /**
     * Get the desa that owns the Alamat
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function village(): BelongsTo
    {
        return $this->belongsTo(Village::class, 'desa', 'code')->withDefault();
    }

    /**
     * Get the desa that owns the Alamat
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class, 'kecamatan', 'code')->withDefault();
    }

    /**
     * Get the desa that owns the Alamat
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'kabupaten', 'code')->withDefault();
    }

    /**
     * Get the desa that owns the Alamat
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'provinsi', 'code')->withDefault();
    }
    
}
