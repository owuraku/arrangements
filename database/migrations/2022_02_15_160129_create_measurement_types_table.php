<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formfield_types', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');

        });

         Schema::table('formfields', function (Blueprint $table) {
            $table->foreign('formfield_type_id')->references('id')->on('formfield_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('measurement_types');
    }
};
