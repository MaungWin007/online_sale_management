<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('salecode');
            $table->bigInteger('customer_id')->nullable();
            $table->bigInteger('branch_id');
            $table->string('paymenttype');
            $table->integer('totalamount');
            $table->string('deliveryaddress');
            $table->bigInteger('township_id');
            $table->string('bankimage')->nullable();
            $table->bigInteger('bank_id')->nullable();
            $table->string('discount')->nullable();
            $table->integer('discountamount')->default(0);
            $table->integer('totalpoint')->default(0);
            $table->integer('paidamount');
            $table->string('uuid')->nullable();
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
        Schema::dropIfExists('sales');
    }
}
