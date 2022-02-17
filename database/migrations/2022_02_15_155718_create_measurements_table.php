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
        Schema::create('formfields', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('description');
            $table->unsignedBigInteger('formfield_type_id');
            $table->boolean('is_input_text')->default(true);
            $table->string('placeholder')->nullable();
            $table->json('options')->nullable();
            $table->string('class')->nullable();
            $table->string('imagelink')->nullable();
            $table->string('videolink')->nullable();
            $table->integer('min')->nullable();
            $table->integer('max')->nullable();
            $table->integer('position');
            $table->unsignedBigInteger('arrangement_id');

            $table->foreign('arrangement_id')->references('id')->on('arrangements');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('measurements');
    }
};
