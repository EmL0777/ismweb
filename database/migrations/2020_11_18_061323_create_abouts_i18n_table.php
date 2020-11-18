<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsI18nTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts_i18n', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('about_id');
            $table->string('languages');
            $table->string('title');
            $table->text('content')->nullable();
            $table->timestamps();

            $table->foreign('about_id')
                ->references('id')
                ->on('abouts')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abouts_i18n');
    }
}
