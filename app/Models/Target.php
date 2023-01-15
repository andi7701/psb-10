<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravolt\Indonesia\Models\District;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Target extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the district associated with the Target
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function district(): HasOne
    {
        return $this->hasOne(District::class, 'code', 'kecamatan')->withDefault();
    }

    /**
     * Get all of the user for the Target
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function user(): HasManyThrough
    {
        return $this->hasManyThrough(User::class, SekolahSd::class, 'kecamatan', 'id', 'kecamatan', 'user_id');
    }
}
