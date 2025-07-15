<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Lang;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Language::create([
        'code' => 'fr',
        'name' => 'Français',
       ]);
       Language::create([
        'code' => 'en',
        'name' => 'English',
       ]);
       Language::create([
        'code' => 'es',
        'name' => 'Español',
       ]);
       Language::create([
        'code' => 'de',
        'name' => 'Deutsch',
       ]);
    }
}