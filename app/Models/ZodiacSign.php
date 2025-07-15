<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ZodiacSign extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Summary of guarded
     * @var array
     */
    protected $guarded = [];

    /**
     * Summary of sectionContents
     * @return HasMany<SectionContent, ZodiacSign>
     */
    public function subSectionContents(): HasMany
    {
        return $this->hasMany(SectionContent::class);
    }

    /**
     * Summary of language
     * @return BelongsTo<Language, ZodiacSign>
     */
    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }
}
