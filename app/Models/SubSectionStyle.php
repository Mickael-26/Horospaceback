<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubSectionStyle extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Summary of guarded
     * @var array
     */
    protected $guarded = [];

    /**
     * Summary of subSectionContent
     * @return BelongsTo<SubSectionContent, SubSectionStyle>
     */
    public function subSectionContent(): BelongsTo
    {
        return $this->belongsTo(SubSectionContent::class);
    }
}
