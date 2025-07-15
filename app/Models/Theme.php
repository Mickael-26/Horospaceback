<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Theme extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Summary of guarded
     * @var array
     */
    protected $guarded = [];

    /**
     * Summary of formContactStyle
     * @return BelongsTo<FormContactStyle, Theme>
     */
    public function formContactStyle(): BelongsTo
    {
        return $this->belongsTo(FormContactStyle::class);
    }

    /**
     * Summary of zodiacSignStyle
     * @return BelongsTo<ZodiacSignStyle, Theme>
     */
    public function zodiacSignStyle(): BelongsTo
    {
        return $this->belongsTo(ZodiacSignStyle::class);
    }

    /**
     * Summary of user
     * @return BelongsTo<User, Theme>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Summary of category
     * @return BelongsTo<Category, Theme>
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Summary of medias
     * @return BelongsTo<Medias, Theme>
     */
    public function medias(): BelongsTo
    {
        return $this->belongsTo(Medias::class);
    }

    /**
     * Summary of themeContents
     * @return HasMany<ThemeContent, Theme>
     */
    public function themeContents(): HasMany
    {
        return $this->hasMany(ThemeContent::class);
    }

    /**
     * Summary of introContents
     * @return HasMany<introContent, Theme>
     */
    public function introContents(): HasMany
    {
        return $this->hasMany(introContent::class);
    }

    /**
     * Summary of sectionContents
     * @return HasMany<SectionContent, Theme>
     */
    public function sectionContents(): HasMany
    {
        return $this->hasMany(SectionContent::class);
    }
}
