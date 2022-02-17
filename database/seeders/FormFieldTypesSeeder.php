<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormFieldTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         DB::table('formfield_types')->insert([
             [ 'name' => 'input'] ,
             ['name' => 'textarea'],
             ['name' => 'select'],
             ['name' => 'image']
            ]);
    }
}
