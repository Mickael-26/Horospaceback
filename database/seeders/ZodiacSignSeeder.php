<?php

namespace Database\Seeders;

use App\Models\ZodiacSign;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ZodiacSignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ZodiacSign::create([
            'name' => 'Bélier',
            'language_id' => 1,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F1.ee4715cd.png&w=256&q=75',
        ]);
        ZodiacSign::create([
            'name' => 'Taureau',
            'language_id' => 1,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F2.e86fbb72.png&w=384&q=75',
        ]);
        ZodiacSign::create([
            'name' => 'Gémeaux',
            'language_id' => 1,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F3.a07c845f.png&w=384&q=75',
        ]);
        ZodiacSign::create([
            'name' => 'Cancer',
            'language_id' => 1,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F4.b026b90e.png&w=384&q=75',
        ]);
        ZodiacSign::create([
            'name' => 'Lion',
            'language_id' => 1,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F5.87abb3a1.png&w=384&q=75'
        ]);
        ZodiacSign::create([
            'name' => 'Vierge',
            'language_id' => 1,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F6.16b0e2ae.png&w=384&q=75'
        ]);
        ZodiacSign::create([
            'name' => 'Balance',
            'language_id' => 1,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F7.908685a6.png&w=384&q=75'
        ]);
        ZodiacSign::create([
            'name' => 'Scorpion',
            'language_id' => 1,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F8.c7b4e7a2.png&w=384&q=75'
        ]);
        ZodiacSign::create([
            'name' => 'Sagittaire',
            'language_id' => 1,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F9.bfc642b2.png&w=384&q=75'
        ]);
        ZodiacSign::create([
            'name' => 'Capricorne',
            'language_id' => 1,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F10.24f7d1b9.png&w=384&q=75'
        ]);
        ZodiacSign::create([
            'name' => 'Verseau',
            'language_id' => 1,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F11.3a1dd36b.png&w=384&q=75'
        ]);
        ZodiacSign::create([
            'name' => 'Poissons',
            'language_id' => 1,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F12.ab025822.png&w=384&q=75'
        ]);
        ZodiacSign::create([
            'name' => 'Aries',
            'language_id' => 2,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F1.ee4715cd.png&w=256&q=75',
        ]);
        ZodiacSign::create([
            'name' => 'Taurus',
            'language_id' => 2,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F2.e86fbb72.png&w=384&q=75',
        ]);
        ZodiacSign::create([
            'name' => 'Gemini',
            'language_id' => 2,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F3.a07c845f.png&w=384&q=75',
        ]);
        ZodiacSign::create([
            'name' => 'Cancer',
            'language_id' => 2,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F4.b026b90e.png&w=384&q=75',
        ]);
        ZodiacSign::create([
            'name' => 'Leo',
            'language_id' => 2,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F5.87abb3a1.png&w=384&q=75'
        ]);
        ZodiacSign::create([
            'name' => 'Virgo',
            'language_id' => 2,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F6.16b0e2ae.png&w=384&q=75'
        ]);
        ZodiacSign::create([
            'name' => 'Libra',
            'language_id' => 2,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F7.908685a6.png&w=384&q=75'
        ]);
        ZodiacSign::create([
            'name' => 'Scorpio',
            'language_id' => 2,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F8.c7b4e7a2.png&w=384&q=75'
        ]);
        ZodiacSign::create([
            'name' => 'Sagittarius',
            'language_id' => 2,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F9.bfc642b2.png&w=384&q=75'
        ]);
        ZodiacSign::create([
            'name' => 'Capricorn',
            'language_id' => 2,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F10.24f7d1b9.png&w=384&q=75'
        ]);
        ZodiacSign::create([
            'name' => 'Aquarius',
            'language_id' => 2,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F11.3a1dd36b.png&w=384&q=75'
        ]);
        ZodiacSign::create([
            'name' => 'Pisces',
            'language_id' => 2,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F12.ab025822.png&w=384&q=75'
        ]);
        ZodiacSign::create([
            'name' => 'Aries',
            'language_id' => 3,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F1.ee4715cd.png&w=256&q=75',
        ]);
        ZodiacSign::create([
            'name' => 'Tauro',
            'language_id' => 3,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F2.e86fbb72.png&w=384&q=75',
        ]);
        ZodiacSign::create([
            'name' => 'Geminis',
            'language_id' => 3,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F3.a07c845f.png&w=384&q=75',
        ]);
        ZodiacSign::create([
            'name' => 'Cáncer',
            'language_id' => 3,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F4.b026b90e.png&w=384&q=75',
        ]);
        ZodiacSign::create([
            'name' => 'Leo',
            'language_id' => 3,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F5.87abb3a1.png&w=384&q=75'
        ]);
        ZodiacSign::create([
            'name' => 'Virgo',
            'language_id' => 3,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F6.16b0e2ae.png&w=384&q=75'
        ]);
        ZodiacSign::create([
            'name' => 'Libra',
            'language_id' => 3,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F7.908685a6.png&w=384&q=75'
        ]);
        ZodiacSign::create([
            'name' => 'Escorpio',
            'language_id' => 3,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F8.c7b4e7a2.png&w=384&q=75'
        ]);
        ZodiacSign::create([
            'name' => 'Sagitario',
            'language_id' => 3,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F9.bfc642b2.png&w=384&q=75'
        ]);
        ZodiacSign::create([
            'name' => 'Capricornio',
            'language_id' => 3,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F10.24f7d1b9.png&w=384&q=75'
        ]);
        ZodiacSign::create([
            'name' => 'Acuario',
            'language_id' => 3,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F11.3a1dd36b.png&w=384&q=75'
        ]);
        ZodiacSign::create([
            'name' => 'Piscis',
            'language_id' => 3,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F12.ab025822.png&w=384&q=75'
        ]);
        ZodiacSign::create([
            'name' => 'Widder',
            'language_id' => 4,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F1.ee4715cd.png&w=256&q=75',
        ]);
        ZodiacSign::create([
            'name' => 'Stier',
            'language_id' => 4,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F2.e86fbb72.png&w=384&q=75',
        ]);
        ZodiacSign::create([
            'name' => 'Zwillinge',
            'language_id' => 4,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F3.a07c845f.png&w=384&q=75',
        ]);
        ZodiacSign::create([
            'name' => 'Krebs',
            'language_id' => 4,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F4.b026b90e.png&w=384&q=75',
        ]);
        ZodiacSign::create([
            'name' => 'Löwe',
            'language_id' => 4,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F5.87abb3a1.png&w=384&q=75'
        ]);
        ZodiacSign::create([
            'name' => 'Jungfrau',
            'language_id' => 4,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F6.16b0e2ae.png&w=384&q=75'
        ]);
        ZodiacSign::create([
            'name' => 'Waage',
            'language_id' => 4,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F7.908685a6.png&w=384&q=75'
        ]);
        ZodiacSign::create([
            'name' => 'Skorpion',
            'language_id' => 4,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F8.c7b4e7a2.png&w=384&q=75'
        ]);
        ZodiacSign::create([
            'name' => 'Schütze',
            'language_id' => 4,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F9.bfc642b2.png&w=384&q=75'
        ]);
        ZodiacSign::create([
            'name' => 'Steinbock',
            'language_id' => 4,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F10.24f7d1b9.png&w=384&q=75'
        ]);
        ZodiacSign::create([
            'name' => 'Wassermann',
            'language_id' => 4,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F11.3a1dd36b.png&w=384&q=75'
        ]);
        ZodiacSign::create([
            'name' => 'Fische',
            'language_id' => 4,
            'img' => 'https://www.horoscope.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F12.ab025822.png&w=384&q=75'
        ]);
    }
}
