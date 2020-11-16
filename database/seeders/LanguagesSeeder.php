<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $language = new Language();
        $language->code = 'en';
        $language->save();

        $language = new Language();
        $language->code = 'ar';
        $language->save();

        $language = new Language();
        $language->code = 'ru';
        $language->save();
    }
}
