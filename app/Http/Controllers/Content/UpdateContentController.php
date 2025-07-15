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

class UpdateContentController extends Controller
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
     * Summary of update
     * @param \Illuminate\Http\Request $request
     * @return  Illuminate\View\View
     */
    public function update(Request $request): View
    {
        $themes = $this->repo->getAllSlugTheme();
        $options = $this->sectionService->getSectionOptions($request->id);
        $subContents = $this->sectionService->getSubSectionOptions($request->id);
        return view('update-content.index', compact('options', 'subContents', 'themes'));
    }
}
