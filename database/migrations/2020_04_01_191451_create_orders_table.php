<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('delivering_address_id');
            $table->text('doctor_id');
            $table->boolean('is_insured');
            $table->bigInteger('status_id');
            $table->bigInteger('pharmacy_id');
            $table->bigInteger('order_user_id');
            $table->text('creator_type');
            $table->bigInteger('total_price');

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
        Schema::dropIfExists('orders');
    }
}
