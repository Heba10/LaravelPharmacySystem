<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicineOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine_order', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('mid_id')->unique();
            $table->bigInteger('order_id')->unique();
            $table->bigInteger('quantity');
            $table->bigInteger('price');
            $table->string('preceptions')->max(150);


            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicine_order');
    }
}
