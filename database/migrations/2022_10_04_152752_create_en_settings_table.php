<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('en_settings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('HIC fine Printing Solution');
            $table->string('logo')->default('HIC.png');
            $table->text('address')->nullable();
            $table->string('mobile')->default('03106473564');
            $table->string('email')->default('info@hicpk.com');
            $table->string('regsitration_no')->default('abc-12345');
            $table->string('contact')->default('0616676109');
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
        Schema::dropIfExists('en_settings');
    }
}
