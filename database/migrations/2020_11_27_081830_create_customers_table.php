<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name',100);
            $table->integer('customer_number')->unique();
            $table->date('customer_dob')->nullable();
            $table->string('gender',10);
            $table->string('customer_address',50);
            $table->string('mobile_number',20);

            $table->string('father_name',100)->nullable();
            $table->string('grandfather_name',100)->nullable();
            
            $table->string('citizenship_number',20)->nullable();
            $table->string('citizenship_issued_district',50)->nullable();
            
            $table->string('customer_type',10);
            $table->string('tap_type',20);
            $table->string('tap_size',10);
            $table->integer('number_of_consumers');

            $table->string('meter_serial',20)->unique();
            $table->string('meter_initial_reading',10);
            $table->date('meter_connected_date');
            $table->integer('meter_reading_zone');
            $table->integer('ward');


            // Land Info
            $table->string('naksha_number',20)->nullable();
            $table->string('sheet_number',20)->nullable();
            $table->string('kitta_number',20)->nullable();
            $table->string('area_of_land',20)->nullable();
            $table->string('house_number',20)->nullable();
            $table->string('purja_number',20)->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
