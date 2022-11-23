<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Bar;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $brand = Brand::create([
            "name" => "Delirium"
        ]);

        $beer = $brand->beers()->create([
            "name" => "Delirium Red",
            "price" => 4.5,
            "type" => "red"
        ]);

        $bar = Bar::create([
            "name" => "Beer'O Clock"
        ]);

        $bar->beers()->attach($beer);
    }
}
