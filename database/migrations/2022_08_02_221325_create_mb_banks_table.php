<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMbBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mbbanks', function (Blueprint $table) {
            $table->id();
            $table->string('accountNo');
            $table->string('transactionId');
            $table->string('creditAmount');
            $table->string('transactionDate');
            $table->string('availableBalance');
            $table->string('description');
            $table->string('id_username');
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
        Schema::dropIfExists('mb_banks');
    }
}
