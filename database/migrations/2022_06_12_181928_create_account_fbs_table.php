<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountFbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_fbs', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('username')->nullable();
            $table->text('acc')->nullable();
            $table->string('status')->nullable();
            $table->text('notice')->nullable();
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
        Schema::dropIfExists('account_fbs');
    }
}
