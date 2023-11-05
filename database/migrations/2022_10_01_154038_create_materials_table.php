<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->foreignId('user_id')->constrained();
            $table->string('user_name')->nullable();
            $table->decimal('purchase_price')->default(0);
            $table->decimal('badge_number')->default(0);
            $table->enum('color',['green','yellow','blue','orange','red','white'])->default('blue');
            $table->enum('type',['liqued','solid','gas'])->default('solid');
            $table->integer('quantity')->default(0);
            $table->integer('wight')->default(0);
            $table->enum('unit',['kg','ltr'])->default('kg');
            $table->integer('sale_quantity')->default(0);
            $table->integer('total_weight')->default(0);
            $table->integer('remaining_quantity')->default(0);
            $table->integer('remaining_weight')->default(0);
            $table->enum('stock',['instock','outofstock'])->default('instock');
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
        Schema::dropIfExists('materials');
    }
}
