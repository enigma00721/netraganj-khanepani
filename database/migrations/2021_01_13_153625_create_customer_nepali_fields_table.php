<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerNepaliFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_nepali_fields', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('customer_name_nepali',200)->nullable();
            $table->string('customer_address_nepali',200)->nullable();
            $table->string('customer_father_name_nepali',200)->nullable();
            $table->string('customer_grand_father_name_nepali',200)->nullable();

            $table->unsignedBigInteger('customer_id'); 
        });

         Schema::table('customer_nepali_fields', function($table) {
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
        Schema::dropIfExists('customer_nepali_fields');
    }
}
