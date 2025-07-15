<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SectionStyle extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Summary of guarded
     * @var array
     */
    protected $guarded = [];

    /**
     * Summary of sectionContent
     * @return BelongsTo<SectionStyle, SectionStyle>
     */
    public function sectionContent(): BelongsTo
    {
        return $this->belongsTo(SectionStyle::class);
    } 
}
