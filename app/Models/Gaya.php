<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gaya extends Model
{
    use HasFactory;
    protected $guarded = [];


    /**
     * Get all of the jawab for the GayaBelajar
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jawab(): HasMany
    {
        return $this->hasMany(JawabGaya::class);
    }
}
