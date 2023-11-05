<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('return_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->integer('quantity')->default(0);
            $table->integer('weight')->default(0);
            $table->decimal('price')->default(0);
            $table->double('gate_pass_id');
            $table->text('reason')->nullable();
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
        Schema::dropIfExists('return_items');
    }
}
