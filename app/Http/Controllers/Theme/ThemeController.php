<?php

namespace App\Http\Controllers\Theme;

use App\Http\Controllers\Controller;
use App\Models\FormContactStyle;
use App\Models\ZodiacSignStyle;
use App\Models\Theme;
use App\Repositories\Theme\ThemeRepository;
use App\Services\StoreImageService;
use App\Http\Requests\ThemeStyleRequest;

class ThemeController extends Controller
{
    protected $repo;

    protected $storeImageService;

    public function __construct(ThemeRepository $repo, StoreImageService $storeImageService)
    {
        $this->repo = $repo;
        $this->storeImageService = $storeImageService;
    }
    public function themeStyle()
    {
        $themes = $this->repo->getAllSlugTheme();

        return view("theme.theme-style", compact("themes"));
    }

    public function storeThemeStyle(ThemeStyleRequest $request)
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
