<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class SectionContent extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Summary of guarded
     * @var array
     */
    protected $guarded = [];

    /**
     * Summary of theme
     * @return BelongsTo<Theme, SectionContent>
     */
    public function theme(): BelongsTo
    {
        return $this->belongsTo(Theme::class);
    }

    /**
     * Summary of language
     * @return BelongsTo<Language, SectionContent>
     */
    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }
    
    /**
     * Summary of sectionStyles
     * @return HasMany<SectionStyle, SectionContent>
     */
    public function sectionStyles(): HasMany
    {
        return $this->hasMany(SectionStyle::class);
    }

    /**
     * Summary of SubSectionContents
     * @return HasMany<SubSectionContent, SectionContent>
     */
    public function SubSectionContents(): HasMany
    {
        return $this->hasMany(SubSectionContent::class);
    }
}
