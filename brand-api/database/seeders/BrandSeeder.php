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
                'created_at' => now(),
            ],
            [
                'brand_name' => Str::random(6),
                'brand_image' => null,
                'rating' => 6,
                'created_at' => now(),
            ],
            [
                'brand_name' => Str::random(6),
                'brand_image' => null,
                'rating' => 6,
                'created_at' => now(),
            ],
        ];

        DB::table('brands')->upsert($brands, ['brand_name']);
    }
}
