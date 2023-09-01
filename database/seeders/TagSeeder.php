<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        foreach (config('defaults.tags') as $value) {
            Tag::firstOrCreate(['name' => $value]);
        }
    }
}
