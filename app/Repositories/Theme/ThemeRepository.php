<?php

namespace App\Repositories\Theme;

use Illuminate\Support\Facades\DB;

class ThemeRepository 
{
    /**
     * Summary of getAllSlugTheme
     * @return array
     */
    public function getAllSlugTheme(): array
    {
        $themes = DB::select("SELECT themes.id, theme_contents.slug FROM theme_contents
        INNER JOIN themes ON theme_contents.theme_id = themes.id WHERE language_id = 1 AND themes.deleted_at IS NULL ");

        return $themes;
    }
}
