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
            $table->string('old_system_no',20);
            $table->date('customer_dob')->nullable();
            $table->string('gender',10);
            $table->string('customer_address',50);
            $table->string('mobile_number',20);

            $table->string('father_name',100)->nullable();
            $table->string('grandfather_name',100)->nullable();
            
            $table->string('citizenship_number',20)->nullable();
            $table->string('citizenship_issued_district',50)->nullable();
            
            $table->string('customer_type',10);

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
