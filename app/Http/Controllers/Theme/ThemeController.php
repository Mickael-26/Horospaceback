<?php

namespace App\Http\Controllers\Theme;

use App\Http\Controllers\Controller;
use App\Models\FormContactStyle;
use App\Models\ZodiacSignStyle;
use App\Models\Theme;
use App\Repositories\Theme\ThemeRepository;
use App\Services\StoreImageService;
use App\Http\Requests\ThemeStyleRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ThemeController extends Controller
{
    /**
     * Summary of repo
     * @var 
     */
    protected $repo;
    /**
     * Summary of storeImageService
     * @var 
     */
    protected $storeImageService;

    /**
     * Summary of __construct
     * @param \App\Repositories\Theme\ThemeRepository $repo
     * @param \App\Services\StoreImageService $storeImageService
     */
    public function __construct(ThemeRepository $repo, StoreImageService $storeImageService)
    {
        $this->repo = $repo;
        $this->storeImageService = $storeImageService;
    }

    /**
     * Summary of themeStyle
     * @return \Illuminate\Contracts\View\View
     */
    public function themeStyle(): View
    {
        $themes = $this->repo->getAllSlugTheme();

        return view('theme.theme-style', compact('themes'));
    }

    /**
     * Summary of storeThemeStyle
     * @param \App\Http\Requests\ThemeStyleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeThemeStyle(ThemeStyleRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $theme = Theme::find($data['theme_id']);

        if ($theme) {
            if ($theme->zodiacSignStyle) {
                $theme->zodiacSignStyle->update([
                    'color_name' => $data['color_name'],
                    'color_background' => $data['color_background'],
                    'font' => $data['font'],
                ]);
            }
            if ($theme->formContactStyle) {
                $theme->formContactStyle->update([
                    'color_text' => $data['color_text'],
                    'color_background' => $data['color_background_form'],
                ]);
            }
            if(isset($data['img_theme'])) {
                $theme->medias->update([
                    'img_theme' =>$this->storeImageService->storeImageIfExists($data['img_theme'], 'medias-themes')
                ]);
            }
        }

        return back()->with('status', 'style-added');
    }
}
