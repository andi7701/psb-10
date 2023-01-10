<?php

namespace App\Models;

use App\Models\Biodata;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembayaran extends Model
{
    use HasFactory;
    protected $guarded = [];


    /**
     * Get the biodata that owns the Pembayaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function biodata(): BelongsTo
    {
        return $this->belongsTo(Biodata::class, 'user_id', 'user_id')->withDefault();
    }

    /**
     * Get all of the biodata for the Pembayaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function biodatas(): HasMany
    {
        return $this->hasMany(Biodata::class, 'user_id', 'user_id');
    }


    /**
     * Get the panitia that owns the Pembayaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function panitia(): BelongsTo
    {
        return $this->belongsTo(User::class, 'panitia_id')->withDefault();
    }

    /**
     * Get the sekolahSd that owns the Pembayaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sekolahSd(): BelongsTo
    {
        return $this->belongsTo(SekolahSd::class, 'user_id', 'user_id')->withDefault();
    }

    
    /**
     * Get the user that owns the Pembayaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault();
    }
}
