<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\IntroStyleRequest;
use App\Http\Requests\UpdateSectionStyleRequest;
use App\Http\Requests\UpdateSubSectionStyleRequest;
use Illuminate\Http\Request;
use App\Repositories\Theme\ThemeRepository;
use App\Models\Theme;
use App\Models\SectionStyle;
use App\Models\SubSectionStyle;
use App\Services\SectionService;
use App\Services\StoreImageService;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ContentController extends Controller
{
    /**
     * Summary of repo
     * @var
     */
    protected $repo;
    protected $sectionService;
    protected $storeImageService;

    /**
     * Summary of __construct
     * @param \App\Repositories\Theme\ThemeRepository $repo
     */
    public function __construct(ThemeRepository $repo, SectionService $sectionService, StoreImageService $storeImageService)
    {
        $this->repo = $repo;
        $this->sectionService = $sectionService;
        $this->storeImageService = $storeImageService;
    }

    /**
     * Summary of index
     * @return Illuminate\View\View
     */
    public function index(): View
    {
        $themes = $this->repo->getAllSlugTheme();
        $options = $this->sectionService->getSectionOptions();
        $subContents = $this->sectionService->getSubSectionOptions();
        return view("content-style.content-style", compact('themes', 'options', 'subContents'));
    }
    /**
     * Summary of update
     * @param \Illuminate\Http\Request $request
     * @return  Illuminate\View\View
     */
    public function update(Request $request): View
    {
        $themes = $this->repo->getAllSlugTheme();
        $options = $this->sectionService->getSectionOptions($request->id);
        $subContents = $this->sectionService->getSubSectionOptions($request->id);
        return view('content-style.update', compact('options', 'subContents','themes'));
    }
    /**
     * Summary of updateSectionStyle
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse
     */
    public function updateSectionStyle(UpdateSectionStyleRequest $request): RedirectResponse
    {
       
        $data = $request->validated();
        
        $updateData = [];

        $simpleFields = [
            'color_title',
            'color_background',
            'font_title',
            'section_content_id'
        ];

        foreach($simpleFields as $field){
            if(!is_null($data[$field] ?? null)) {
                $updateData[$field] = $data[$field];
            }
        }

        if (isset($data['img_background'])) {
            $updateData['img_background'] = $this->storeImageService->storeImageIfExists($data['img_background'], 'content-sections');
        }

        if (isset($data['img_section'])) {
            $updateData['img_section'] = $this->storeImageService->storeImageIfExists($data['img_section'], 'content-sections');
        }

        SectionStyle::where('section_content_id', $data['section_content_id'])->update($updateData);

        return back()->with('status', 'style-section-updated');
    }

    /**
     * Summary of updateSubSectionStyle
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse
     */
    public function updateSubSectionStyle(UpdateSubSectionStyleRequest $request)
    {
        $data = $request->validated();

        $updateData = [];

        foreach (['dates', 'numbers'] as $jsonField) {
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

        SubSectionStyle::where('sub_section_content_id', $data['sub_section_content_id'])->update($updateData);

        return back()->with('status', 'style-sub-section-updated');
    }
    /**
     * Summary of addThemeSubSectionStyle
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse
     */
    public function addThemeSubSectionStyle(UpdateSubSectionStyleRequest $request)
    {

        $data = $request->validated();

        if (isset($data['img'])) {
            $data['img'] = $this->storeImageService->storeImageIfExists($data['img'], 'subSection-content');
        }

        SubSectionStyle::create([
            'border_color_lucky_number' => $data["border_color_lucky_number"],
            'color_list_dates' => $data["color_list_dates"],
            'color_list_numbers' => $data['color_list_numbers'],
            'color_lucky_number' => $data['color_lucky_number'],
            'color_sub_paragraph' => $data['color_sub_paragraph'],
            'color_sub_title' => $data['color_sub_title'],
            'color_title' => $data['color_title'],
            'font_paragraph' => $data['font_paragraph'],
            'font_sub_title' => $data['font_sub_title'],
            'list_dates' => isset($data['dates'][0]) === null || !isset($data['dates']) ? null : json_encode($data['dates']),
            'font_title' => $data['font_title'],
            'list_numbers' => isset($data['numbers'][0]) === null || !isset($data['numbers']) ? null : json_encode($data['numbers']),
            'lucky_number' => $data['lucky_number'],
            'sub_section_content_id' => $data['sub_section_content_id'],
            'img' => $data['img'] ?? null
        ]);

        return back()->with('status', 'added');
    }
    /**
     * Summary of addThemeSectionStyle
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse
     */
    public function addThemeSectionStyle(UpdateSectionStyleRequest $request): RedirectResponse
    {
        $data = $request->validated();
        if (isset($data['img_background'])) {
            $data['img_background'] = $this->storeImageService->storeImageIfExists($data['img_background'], 'content-sections');
        }
        if (isset($data['img_section'])) {
            $data['img_section'] = $this->storeImageService->storeImageIfExists($data['img_section'], 'content-sections');
        }
        SectionStyle::create([
            'color_title' => $data['color_title'],
            'color_background' => $data['color_background'],
            'font_title' => $data['font_title'],
            'img_background' => $data['img_background'] ?? null,
            'img_section' => $data['img_section'] ?? null,
            'section_content_id' => $data['section_content_id']
        ]);

        return back()->with('status', 'style-section-added');
    }

    /**
     * Summary of addThemeIntroStyle
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addThemeIntroStyle(IntroStyleRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $theme = Theme::find($data['theme_id']);
        $intro = $theme->introContents->first();

        if ($theme) {
            if ($intro) {
                $intro->introStyles()->create([
                    'color_title' => $data['color_title'],
                    'color_year' => $data['color_year'],
                    'color_small_text' => $data['color_small_text'],
                    'color_background_nav' => $data['color_background_nav'],
                    'color_background_intro' => $data['color_background_intro'],
                    'font_title' => $data['font_title'],
                    'font_small_text' => $data['font_small_text'],
                    'font_year' => $data['font_year'],
                    'img_background_mobile_intro' => $this->storeImageService->storeImageIfExists($data['img_background_mobile_intro'], 'content-intros'),
                    'img_background_intro' => $this->storeImageService->storeImageIfExists($data['img_background_intro'], 'content-intros'),
                    'img_nav' => $this->storeImageService->storeImageIfExists($data['img_nav'], 'content-intros'),
                ]);
            }
        }

        return redirect()->route('content-style.content-style-index');
    }
}
