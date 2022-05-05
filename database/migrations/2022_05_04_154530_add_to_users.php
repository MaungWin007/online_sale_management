<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('phoneno')->after('password');
            $table->string('uuid')->unique()->after('phoneno');
            $table->string('image',100)->after('uuid');
            $table->string('type')->after('image');
            $table->biginteger('branch_id')->after('type');
            $table->string('status')->nullable()->default('Active')->after('branch_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phoneno');
            $table->dropColumn('uuid');
            $table->dropColumn('image');
            $table->dropColumn('type');
            $table->dropColumn('branch_id');
            $table->dropColumn('status');
        });
    }
}
