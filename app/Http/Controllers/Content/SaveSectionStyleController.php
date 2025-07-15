<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSectionStyleRequest;
use App\Models\SectionStyle;
use Illuminate\Http\RedirectResponse;
use App\Services\StoreImageService;

class SaveSectionStyleController extends Controller
{
    /**
     * Summary of storeImageService
     * @var 
     */
    protected $storeImageService;

    /**
     * Summary of __construct
     * @param \App\Services\StoreImageService $storeImageService
     */
    public function __construct(StoreImageService $storeImageService)
    {
        $this->storeImageService = $storeImageService;
    }
    /**
     * Summary of updateSectionStyle
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse
     */
    public function saveSectionStyle(UpdateSectionStyleRequest $request): RedirectResponse
    {

        $data = $request->validated();

        $updateData = [];

        $simpleFields = [
            'color_title',
            'color_background',
            'font_title',
            'section_content_id'
        ];

        foreach ($simpleFields as $field) {
            if (!is_null($data[$field] ?? null)) {
                $updateData[$field] = $data[$field];
            }
        }

        if (isset($data['img_background'])) {
            $updateData['img_background'] = $this->storeImageService->storeImageIfExists($data['img_background'], 'content-sections');
        }

        if (isset($data['img_section'])) {
            $updateData['img_section'] = $this->storeImageService->storeImageIfExists($data['img_section'], 'content-sections');
        }

        $sectionStyle = SectionStyle::where('section_content_id', $data['section_content_id'])->get();
        if ($sectionStyle->isEmpty()) {
            SectionStyle::create($updateData);
        } else {
            SectionStyle::where('section_content_id', $data['section_content_id'])->update($updateData);
        }

        return back()->with('status', 'style-section-updated');
    }
}
