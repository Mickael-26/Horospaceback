<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\IntroStyle;

class IntroContent extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Summary of guarded
     * @var array
     */
    protected $guarded = [];

    /**
     * Summary of language
     * @return BelongsTo<Language, IntroContent>
     */
    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    /**
     * Summary of introStyles
     * @return HasMany<IntroStyle, IntroContent>
     */
    public function introStyles():HasMany
    {
        return $this->hasMany(IntroStyle::class);
    }

    /**
     * Summary of theme
     * @return BelongsTo<Theme, IntroContent>
     */
    public function theme(): BelongsTo
    {
        return $this->belongsTo(Theme::class);
    }
}
