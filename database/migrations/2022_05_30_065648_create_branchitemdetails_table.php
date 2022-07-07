<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchitemdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branchitemdetails', function (Blueprint $table) {
            $table->id();
            $table->biginteger('branchitem_id');
            $table->biginteger('itemdetail_id');
            $table->integer('qty');
            $table->string('uuid');
            $table->string('status')->default('Active');
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
        Schema::dropIfExists('branchitemdetails');
    }
}
