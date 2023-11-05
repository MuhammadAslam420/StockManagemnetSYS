<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_balances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->text('notes')->nullable();
            $table->decimal('deposite_amount')->default(0);
            $table->date('deposite_date')->nullable();
            $table->decimal('remaining_payment')->default(0);
            $table->decimal('total_deposite')->default(0);
            $table->decimal('total_deposite',14,2)->default(0);
            $table->decimal('withdraw_amount',14,2)->default(0);
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
        Schema::dropIfExists('supplier_balances');
    }
}
