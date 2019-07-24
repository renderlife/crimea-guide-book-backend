<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePointsFieldTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('points', function (Blueprint $table) {
            $table->string('coordinate', 50)->nullable()->change();
            $table->integer('city_id')->nullable()->change();
            $table->string('street', 50)->nullable()->change();
            $table->string('house', 10)->nullable()->change();
            $table->string('place')->nullable()->change();
            $table->text('short_text')->nullable()->change();
            $table->text('full_text')->nullable()->change();
            $table->text('picture_cover')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('points', function (Blueprint $table) {
            $table->string('coordinate', 50);
            $table->integer('city_id');
            $table->string('street', 50);
            $table->string('house', 10);
            $table->string('place');
            $table->text('short_text');
            $table->text('full_text');
            $table->text('picture_cover');
        });
    }
}
