<?php

use App\Http\Controllers\Api\ApiHoroscopeController;
use App\Http\Resources\AllThemesResource;
use App\Http\Resources\ThemesResource;
use App\Http\Resources\ZodiacSignsResource;
use Illuminate\Http\Request;
use App\Models\Theme;
use App\Models\ZodiacSign;
use Illuminate\Support\Facades\Route;

Route::get('/get-theme/{id}/{zodiacSignName}/{lang}', [ApiHoroscopeController::class, 'getTheme'])->where(['id' => '[0-9]+', 'lang' => '[a-zA-Z]{2}']);

Route::get('/get-all-themes', function () {
     $themes = AllThemesResource::collection(
        Theme::with(['category', 'medias'])->where('status', 'active')->get()
    );

    return response()->json([
        'themes' => $themes
    ]);
});
