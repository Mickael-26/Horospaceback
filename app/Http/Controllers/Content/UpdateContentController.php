<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Theme;
use App\Services\SectionService;
use App\Services\StoreImageService;
use Illuminate\View\View;

class UpdateContentController extends Controller
{
    /**
     * Summary of repo
     * @var
     */
    protected $sectionService;
    protected $storeImageService;

    /**
     * Summary of __construct
     * @param \App\Repositories\Theme\ThemeRepository $repo
     */
    public function __construct(SectionService $sectionService, StoreImageService $storeImageService)
    {
        $this->sectionService = $sectionService;
        $this->storeImageService = $storeImageService;
    }
    /**
     * Summary of update
     * @param \Illuminate\Http\Request $request
     * @return  Illuminate\View\View
     */
    public function update(Request $request): View
    {
        $themes = Theme::find($request->id);
        $options = $this->sectionService->getSectionOptions($request->id);
        $subContents = $this->sectionService->getSubSectionOptions($request->id);
        return view('update-content.index', compact('options', 'subContents', 'themes'));
    }
}
