<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Image extends Migration
{
    static $name = 'images';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(256);
        Schema::create(self::$name, function (Blueprint $table) {
            $table->id();
            $table->string('file', 64)->index();
            $table->string('title', 32);
            $table->string('credit', 512)->default('Property of <a href="' . root() . '">Permata Agrindo</a>');
            $table->boolean('privacy')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(self::$name);
    }
}
