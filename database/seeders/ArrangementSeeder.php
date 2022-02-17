<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArrangementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $arrangements = [
            'skirt oversize',
            'sleeve alteration',
            'jeans alteration',
            'skirt alteration',
            'blouse alteration',
            'jeans oversize',
            'jeans layout',
        ];
        $faker = \Faker\Factory::create();
        for ($i=0; $i < 10 ; $i++) {
            DB::table('arrangements')->insert([
                'name' => $faker->randomElement($arrangements),
            ]);

        }
    }
}
