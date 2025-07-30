<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\IntroStyleRequest;
use App\Models\Theme;
use App\Services\StoreImageService;
use Faker\Provider\Image;
use Illuminate\Http\RedirectResponse;

class CreateIntoStyleController extends Controller
{
    /**
     * Summary of storeImageService
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
     * Summary of addThemeIntroStyle
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createThemeIntroStyle(IntroStyleRequest $request): RedirectResponse
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
                    'img_background_intro' => $this->storeImageService->storeImageIfExists($data['img_background_intro'], 'content-intros'),
                    'img_nav' => $this->storeImageService->storeImageIfExists($data['img_nav'], 'content-intros'),
                ]);
            }
        }

        return redirect()->route('dashboard');
    }
}
