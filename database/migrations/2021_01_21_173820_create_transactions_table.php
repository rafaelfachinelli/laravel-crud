<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
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
        $table->string('user_id', 256);
        $table->string('user', 128);
        $table->string('value', 256);
        $table->string('cpf', 256);
        $table->string('file_name')->nullable();
        $table->string('file_path')->nullable();
        $table->string('status', 256)->default('Em processamento');
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
}
