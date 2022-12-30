<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MinatBakat extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get the ekstra that owns the MinatBakat
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ekstra(): BelongsTo
    {
        return $this->belongsTo(Ekstra::class)->withDefault();
    }

    /**
     * Get the user that owns the MinatBakat
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'panitia_id')->withDefault();
    }
}
