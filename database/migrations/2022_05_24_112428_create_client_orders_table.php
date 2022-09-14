<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_orders', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('type')->nullable();
            $table->string('amount');
            $table->string('time_order')->nullable();
            $table->string('total_money');
            $table->string('price');
            $table->string('link_order', 999);
            $table->string('server_order');
            $table->string('interactive')->nullable();
            $table->string('type_order')->nullable();
            $table->string('startWith')->nullable();
            $table->string('buff')->nullable();
            $table->string('status');
            $table->string('code_order')->nullable();
            $table->string('id_order');
            $table->string('ghichu');
            $table->string('type_service');
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
        Schema::dropIfExists('client_orders');
    }
}
