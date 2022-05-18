<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('old_user_wallet_balance');
            $table->bigInteger('price');
            $table->bigInteger('new_user_wallet_balance');
            $table->boolean('is_increment');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->bigInteger('transactionable_id')->index()->nullable();
            $table->string('transactionable_type')->index()->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('transactions');
    }
};
