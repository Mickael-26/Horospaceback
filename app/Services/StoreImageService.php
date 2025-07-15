<?php

namespace App\Services;
use Illuminate\Support\Facades\Storage;

class StoreImageService
{
    public function storeImageIfExists($image, string $path): ?string
    {
        return isset($image) ? Storage::disk('public')->put($path, $image) : null;
    }
}
