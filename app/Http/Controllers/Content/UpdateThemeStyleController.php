<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\ThemeStyleRequest;
use App\Services\StoreImageService;
use App\Models\Theme;

class UpdateThemeStyleController extends Controller
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
     * Summary of updateThemeStyle
     * @param \App\Http\Requests\ThemeStyleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateThemeStyle(ThemeStyleRequest $request)
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
            if (isset($data['img_theme'])) {
                $theme->medias->update([
                    'img_theme' => $this->storeImageService->storeImageIfExists($data['img_theme'], 'medias-themes')
                ]);
            }
        }

        return back()->with('status', 'style-added');
    }
}
