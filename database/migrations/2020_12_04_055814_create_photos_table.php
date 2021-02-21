<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('customer_photo',100)->nullable();
            $table->string('citizenship_front',100)->nullable();
            $table->string('citizenship_back',100)->nullable();
            $table->string('naksa',100)->nullable();
            $table->string('lalpurja',100)->nullable();
            $table->unsignedBigInteger('customer_id');
        });

        Schema::table('photos', function (Blueprint $table) {
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos');
    }
}
