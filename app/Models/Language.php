<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Language extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Summary of guarded
     * @var array
     */
    protected $guarded = [];

    /**
     * Summary of introContents
     * @return HasMany<IntroContent, Language>
     */
    public function introContents(): HasMany
    {
        return $this->hasMany(IntroContent::class);
    }

    /**
     * Summary of themeContents
     * @return HasMany<Theme, Language>
     */
    public function themeContents(): HasMany
    {
        return $this->hasMany(Theme::class);
    }

    /**
     * Summary of sectionContents
     * @return HasMany<SectionContent, Language>
     */
    public function sectionContents(): HasMany
    {
        return $this->hasMany(SectionContent::class);
    }

    /**
     * Summary of subSectionContents
     * @return HasMany<SubSectionContent, Language>
     */
    public function subSectionContents(): HasMany
    {
        return $this->hasMany(SubSectionContent::class);
    }

    /**
     * Summary of zodiacSigns
     * @return HasMany<ZodiacSign, Language>
     */
    public function zodiacSigns(): HasMany
    {
        return $this->hasMany(ZodiacSign::class);
    }
}
