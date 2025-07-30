<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSubSectionStyleRequest;
use App\Models\SubSectionStyle;
use App\Services\StoreImageService;
use Illuminate\Http\RedirectResponse;

class SaveSubSectionStyleController extends Controller
{
    /**
     * Summary of repo
     * @var
     */
    protected $storeImageService;

    /**
     * Summary of __construct
     * @param \App\Repositories\Theme\ThemeRepository $repo
     */
    public function __construct(StoreImageService $storeImageService)
    {
        $this->storeImageService = $storeImageService;
    }
    /**
     * Summary of updateSubSectionStyle
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse
     */
    public function saveSubSectionStyle(UpdateSubSectionStyleRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $updateData = [];

        foreach (['list_dates', 'list_numbers'] as $jsonField) {
            if (isset($data[$jsonField])) {
                $updateData[$jsonField] = json_encode($data[$jsonField]);
            }
        }
        $simpleFields = [
            'lucky_number',
            'color_title',
            'color_sub_title',
            'color_sub_paragraph',
            'color_lucky_number',
            'border_color_lucky_number',
            'color_list_numbers',
            'color_list_dates',
            'font_title',
            'font_sub_title',
            'font_paragraph',
            'sub_section_content_id',
        ];

        foreach ($simpleFields as $field) {
            if (!is_null($data[$field] ?? null)) {
                $updateData[$field] = $data[$field];
            }
        }

        if (isset($data['img'])) {
            $updateData['img'] = $this->storeImageService->storeImageIfExists($data['img'], 'subSection-content');
        }

        $subSection = SubSectionStyle::where('sub_section_content_id', $data['sub_section_content_id'])->get();

        if($subSection->isEmpty()) {
            SubSectionStyle::create($updateData);
        } else {
            SubSectionStyle::where('sub_section_content_id', $data['sub_section_content_id'])->update($updateData);
        }

        return back()->with('status', 'style-sub-section-updated');
    }
}
