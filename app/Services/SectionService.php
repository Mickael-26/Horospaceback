<?php

namespace App\Services;

use App\Models\SectionContent;
use App\Models\SubSectionContent;

class SectionService
{
    public function getSectionOptions(?int $themeId = null)
    {
        $query = SectionContent::select('section_contents.title', 'theme_contents.slug', 'section_contents.id')
            ->distinct()
            ->join('themes', 'themes.id', '=', 'section_contents.theme_id')
            ->join('theme_contents', 'theme_contents.theme_id', '=', 'themes.id')
            ->where('theme_contents.language_id', 1)
            ->where('section_contents.language_id', 1)
            ->whereNull('themes.deleted_at')
            ->orderBy('section_contents.language_id', 'ASC')
            ->groupBy(['section_contents.title', 'theme_contents.slug', 'section_contents.id']);

        if ($themeId) {
            $query->where('themes.id', $themeId);
        }
        $sections = $query->get();

        return $sections->groupBy('slug')->map(function ($items) {
            return $items->map(function ($item) {
                return (object)[
                    'id' => $item->id,
                    'title' => $item->title,
                ];
            });
        });
    }

    public function getSubSectionOptions(?int $themeId = null)
    {
        $query = SubSectionContent::select(
            'sub_section_contents.title AS subSectionTitle',
            'section_contents.title AS sectionTitle',
            'sub_section_contents.id',
            'theme_contents.slug'
        )
            ->join('section_contents', 'section_contents.id', '=', 'sub_section_contents.section_content_id')
            ->join('themes', 'themes.id', '=', 'section_contents.theme_id')
            ->join('theme_contents', 'theme_contents.theme_id', '=', 'themes.id')
            ->where('theme_contents.language_id', 1)
            ->where('sub_section_contents.language_id', 1)
            ->whereNull('themes.deleted_at')
            ->orderBy('section_contents.language_id', 'ASC');

        if ($themeId) {
            $query->where('themes.id', $themeId);
        }

        $subSections = $query->get();

        return $subSections->groupBy('slug')->map(function ($items) {
            return $items->groupBy('sectionTitle')->map(function ($group) {
                return $group->map(function ($item) {
                    return (object)[
                        'id' => $item->id,
                        'subSection' => $item->subSectionTitle,
                    ];
                });
            });
        });
    }
}
