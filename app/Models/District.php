<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class District extends Model
{
    use HasFactory;
    protected $table = 'indonesia_districts';

    /**
     * Get the alamat that owns the District
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function alamat(): BelongsTo
    {
        return $this->belongsTo(Alamat::class, 'code', 'kecamatan')->withDefault();
    }

    /**
     * Get the city that owns the District
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_code', 'code')->withDefault();
    }
    /**
     * Get the sekolahSd that owns the District
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sekolahSd(): BelongsTo
    {
        return $this->belongsTo(SekolahSd::class, 'code', 'kecamatan');
    }
}
