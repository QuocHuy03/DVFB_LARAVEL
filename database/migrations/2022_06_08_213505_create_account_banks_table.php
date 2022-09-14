<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_banks', function (Blueprint $table) {
            $table->id('id');
            $table->string('type')->nullable();
            $table->string('username');
            $table->string('account_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('password')->nullable();
            $table->string('bank_name')->nullable();
            $table->text('logo')->nullable();
            $table->string('min_bank')->nullable();
            $table->string('notice')->nullable();
            $table->text('token')->nullable();
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
        Schema::dropIfExists('account_banks');
    }
}
