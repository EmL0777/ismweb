<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_centers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 50);
            $table->string('address');
            $table->string('phone1', 20);
            $table->string('phone2', 20)->nullable();
            $table->string('fax', 20);
            $table->string('email');
            $table->string('attn', 50);
            $table->string('continent', 20);
            $table->string('country', 50);
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
        Schema::dropIfExists('service_centers');
    }
}
