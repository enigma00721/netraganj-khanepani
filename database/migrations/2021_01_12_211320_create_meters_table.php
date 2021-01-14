<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meters', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // foreign key
            $table->unsignedBigInteger('customer_id'); 

            $table->string('meter_serial',20)->unique();
            $table->string('meter_initial_reading',10);
            $table->date('meter_connected_date');
            $table->date('meter_updated_date')->nullable();
            $table->integer('meter_reading_zone');
            $table->integer('ward');

            $table->string('tap_type',20);
            $table->string('tap_size',10);
            $table->integer('number_of_consumers');

            $table->string('cut_off_reason',200)->nullable();
            $table->boolean('meter_status')->default(1);

        });

         Schema::table('meters', function($table) {
            $table->foreign('customer_id')->references('id')->on('customers')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meters');
    }
}
