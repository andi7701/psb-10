<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Wali;
use App\Models\Alamat;
use App\Models\Biodata;
use App\Models\OrangTua;
use App\Models\SekolahSd;
use App\Models\SekolahAsal;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'kode_daftar',
        'password',
        'tanggal_daftar',
        'slug',
        'user_id',
        'terukur',
        'diterima',
        'sudah_test',
        'sudah_gaya',
        'boleh_test'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the agama associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function agama(): HasOne
    {
        return $this->hasOne(Agama::class)->withDefault();
    }

    /**
     * Get the akademik associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function akademik(): HasOne
    {
        return $this->hasOne(Akademik::class)->withDefault();
    }

    /**
     * Get all of the answers for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }


    /**
     * Get the alamat associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function alamat(): HasOne
    {
        return $this->hasOne(Alamat::class)->withDefault();
    }

    /**
     * Get the biodata associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function biodata(): HasOne
    {
        return $this->hasOne(Biodata::class)->withDefault();
    }

    /**
     * Get all of the biodatas for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function biodatas(): HasMany
    {
        return $this->hasMany(Biodata::class);
    }

    /**
     * Get all of the jawabGaya for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jawabGaya(): HasMany
    {
        return $this->hasMany(JawabGaya::class);
    }

    /**
     * Get the kesehatan associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function kesehatan(): HasOne
    {
        return $this->hasOne(Kesehatan::class)->withDefault();
    }

    /**
     * Get the minatbakat associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function minatBakat(): HasOne
    {
        return $this->hasOne(MinatBakat::class)->withDefault();
    }


    /**
     * Get the orangtua associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function orangTua(): HasOne
    {
        return $this->hasOne(OrangTua::class)->withDefault();
    }

    /**
     * Get the sekolahsd associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sekolahSd(): HasOne
    {
        return $this->hasOne(SekolahSd::class)->withDefault();
    }

    /**
     * Get the sekolahasal associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function sekolahAsal(): HasOne
    {
        return $this->hasOne(SekolahAsal::class)->withDefault();
    }

    /**
     * Get the panitia that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function panitia(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->withDefault(['name' => 'Online']);
    }


    /**
     * Get the panitiaPengumuman that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function panitiaPengumuman(): BelongsTo
    {
        return $this->belongsTo(User::class, 'pengumuman', 'id')->withDefault();
    }


    /**
     * Get the pembayaran associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pembayaran(): HasOne
    {
        return $this->hasOne(Pembayaran::class)->withDefault();
    }

    /**
     * Get the seragam associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function seragam(): HasOne
    {
        return $this->hasOne(Seragam::class)->withDefault();
    }

    /**
     * Get all of the seragams for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function seragams(): HasMany
    {
        return $this->hasMany(Seragam::class);
    }

    /**
     * Get the wawancara associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function wawancara(): HasOne
    {
        return $this->hasOne(Wawancara::class)->withDefault();
    }


    /**
     * Get the wali associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function wali(): HasOne
    {
        return $this->hasOne(Wali::class)->withDefault();
    }


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Interact with the user's name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    // protected function name(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => Str::title($value),
    //         set: fn ($value) => Str::title($value),
    //     );
    // }
}
