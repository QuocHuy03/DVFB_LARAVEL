<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_banks', function (Blueprint $table) {
            $table->id('id');
            $table->string('type');
            $table->string('username');
            $table->string('bank_name')->nullable();
            $table->string('card_type')->nullable();
            $table->string('card_price')->nullable();
            $table->string('serial')->nullable();
            $table->string('code')->nullable();
            $table->string('thucnhan');
            // $table->string('noidung')->nullable();
            $table->string('status');
            $table->string('date')->nullable();
            $table->string('name')->nullable();
            $table->string('transid')->nullable();
            $table->string('taskid')->nullable();
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
        Schema::dropIfExists('history_banks');
    }
}
