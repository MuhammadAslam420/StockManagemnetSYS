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
            $table->foreignId('user_id')->constrained();
            $table->decimal('subtotal')->default(0);
            $table->decimal('total')->default(0);
            $table->decimal('tax')->default(0);
            $table->enum('status',['pending','process','delivered','canceled'])->default('pending');
            $table->string('address')->nullable();
            $table->string('payment_due_date')->nullable();
            $table->date('delivery_date')->nullable();
            $table->double('gate_pass_id')->default(0);
            $table->string('receiver_name')->nullable();
            $table->double('receiver_id')->nullable();
            $table->enum('gate_pass',['isssue','pending'])->default('pending');
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
