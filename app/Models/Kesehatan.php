<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kesehatan extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get the siswa that owns the Akademik
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function siswa(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }
    
    /**
     * Get the user that owns the Kesehatan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'panitia_id')->withDefault();
    }
    
}
