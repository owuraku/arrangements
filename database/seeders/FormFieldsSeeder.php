<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormFieldsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * $table->string('name');
            $table->unsignedBigInteger('measurement_type_id');
            $table->string('placeholder')->nullable();
            $table->string('value')->nullable();
            $table->string('class')->nullable();
            $table->string('imagelink')->nullable();
            $table->string('videolink')->nullable();
            $table->integer('min')->nullable();
            $table->integer('max')->nullable();
            $table->integer('position');
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create();

        for ($i=0; $i < 100 ; $i++) {
            DB::table('formfields')->insert([
                'name' => $faker->name(),
                'formfield_type_id' => $faker->numberBetween(1,4),
                'placeholder' => $faker->sentence(2),
                'arrangement_id'=>$faker->numberBetween(1,10),
                'position' => $faker->numberBetween(1,8),
                'is_input_text'=>$faker->boolean(),
                'options'=> '["ab", "cd", "ef"]',
                'class' => 'form-control',
                'description' => 'This is required',
                'min' => 10,
                'max'=>20
            ]);

        }
    }
}
