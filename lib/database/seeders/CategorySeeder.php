<?php

namespace Database\Seeders;

use App\Models\VpCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VpCategory::insert([
            [
                'cate_name' => 'iPhone',
                'cate_slug' => Str::slug('iPhone'),
            ],
            [
                'cate_name' => 'SamSung',
                'cate_slug' => Str::slug('SamSung'),
            ]
        ]);
    }
}
