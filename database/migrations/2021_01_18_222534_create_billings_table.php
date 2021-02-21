<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // year , month , previous unit , current unit , consumed unit
            // read date  , tarrif , penalty , discount , total , 
            //  paid(boolean / maybe)   , othercharges(maybe) event_charges

            $table->integer('year');
            $table->string('month',20);
            $table->integer('previous_unit');
            $table->integer('current_unit');
            $table->date('read_date');
            $table->float('tarrif', 8, 2);
            $table->float('penalty', 8, 2);
            $table->float('discount', 8, 2);
            $table->float('total', 12, 2);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('billings');
    }
}
