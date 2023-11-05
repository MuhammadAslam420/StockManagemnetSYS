<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('business_name')->after('name')->nullable();
            $table->text('address')->after('business_name')->nullable();
            $table->string('mobile')->after('email')->nullable();
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
            $table->string('business_name')->after('name')->nullable();
            $table->text('address')->after('business_name')->nullable();
            $table->string('mobile')->after('email')->nullable();
        });
    }
}
