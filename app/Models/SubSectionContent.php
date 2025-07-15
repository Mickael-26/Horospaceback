<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\SubSectionStyle;

class SubSectionContent extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Summary of guarded
     * @var array
     */
    protected $guarded = [];

    /**
     * Summary of sectionContent
     * @return BelongsTo<SectionContent, SubSectionContent>
     */
    public function sectionContent(): BelongsTo
    {
        return $this->belongsTo(SectionContent::class);
    }

    /**
     * Summary of language
     * @return BelongsTo<Language, SubSectionContent>
     */
    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    /**
     * Summary of SubSectionStyles
     * @return HasMany<SubSectionStyle, SubSectionContent>
     */
    public function SubSectionStyles(): HasMany
    {
        return $this->hasMany(SubSectionStyle::class);
    }

    /**
     * Summary of zodiacSign
     * @return BelongsTo<ZodiacSign, SectionContent>
     */
    public function zodiacSign(): BelongsTo
    {
        return $this->belongsTo(ZodiacSign::class);
    }
}
