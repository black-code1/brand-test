<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            [
                'brand_name' => Str::random(6),
                'brand_image' => null,
                'rating' => 6,
                'iso_3166_2' => 'CM',
            ],
            [
                'brand_name' => Str::random(6),
                'brand_image' => null,
                'rating' => 6,
                'iso_3166_2' => null
            ],
            [
                'brand_name' => Str::random(6),
                'brand_image' => null,
                'rating' => 6,
                'iso_3166_2' => null
            ],
        ];

        DB::table('brands')->upsert($brands, ['brand_name']);
    }
}
