<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branchitems', function (Blueprint $table) {
            $table->id();
            $table->biginteger('item_id');
            $table->integer('totalqty');
            $table->string('uuid');
            $table->string('status')->default('Active');
            $table->biginteger('branch_id');
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
        Schema::dropIfExists('branchitems');
    }
}
