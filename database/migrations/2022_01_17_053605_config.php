<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Config extends Migration
{
    static $name = 'configs';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {Schema::defaultStringLength(256);
        Schema::create(self::$name, function (Blueprint $table) {
            $table->id();
            $table->string('key', 32)->index()->unique();
            $table->string('type', 256);
            $table->string('val1', 256)->nullable();
            $table->string('val2', 256)->nullable();
            $table->string('val3', 256)->nullable();
            $table->string('val4', 256)->nullable();
            $table->string('val5', 256)->nullable();
            $table->string('val6', 256)->nullable();
            $table->string('val7', 256)->nullable();
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
