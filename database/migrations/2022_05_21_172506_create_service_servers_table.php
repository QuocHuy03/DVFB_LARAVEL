<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_servers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type')->nullable();
            $table->string('code_server');
            $table->string('name_server')->nullable();
            $table->string('server_service')->nullable();
            $table->string('rate_server');
            $table->string('title_server');
            $table->string('content_server')->nullable();
            $table->string('status_server');
            $table->string('reaction')->nullable();
            $table->string('api_server');
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
        Schema::dropIfExists('service_servers');
    }
}
