<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('land_infos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

             // Land Info
            $table->string('naksha_number',20)->nullable();
            $table->string('sheet_number',20)->nullable();
            $table->string('kitta_number',20)->nullable();
            $table->string('area_of_land',20)->nullable();
            $table->string('house_number',20)->nullable();
            $table->string('purja_number',20)->nullable();

            $table->unsignedBigInteger('customer_id'); 
        });

         Schema::table('land_infos', function($table) {
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
        Schema::dropIfExists('land_infos');
    }
}
