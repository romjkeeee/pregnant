<?php

use App\Lang;
use Illuminate\Database\Seeder;

class LangsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Lang::query()->count()) {
            Lang::query()->create(['id' => 1, 'code' => 'ru', 'name' => 'Русский']);
            Lang::query()->create(['id' => 2, 'code' => 'en', 'name' => 'English']);
        }
    }
}
