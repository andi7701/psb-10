<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MinatBakat extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function ekstra()
    {
        return $this->belongsTo(Ekstra::class)->withDefault();
    }
}
