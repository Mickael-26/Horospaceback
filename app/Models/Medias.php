<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medias extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Summary of guarded
     * @var array
     */
    protected $guarded = [];

    /**
     * Summary of medias
     * @return HasMany<Medias, Medias>
     */
    public function medias(): HasMany
    {
        return $this->hasMany(Medias::class);
    }
}
