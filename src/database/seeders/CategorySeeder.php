<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Category::create([
            'content' => 'delivery',
        ]);

        \App\Models\Category::create([
            'content' => 'replace',
        ]);

        \App\Models\Category::create([
            'content' => 'trouble',
        ]);

        \App\Models\Category::create([
            'content' => 'contact',
        ]);

        \App\Models\Category::create([
            'content' => 'others',
        ]);
    }
}
