<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('points', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('coordinate', 50);
            $table->integer('city_id');
            $table->string('street', 50);
            $table->string('house', 10);
            $table->string('place');
            $table->string('title');
            $table->text('short_text');
            $table->text('full_text');
            $table->text('picture_cover');
            $table->string('author')->nullable(); //[TODO] сделать привязку к пользователю, пока просто текст
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
        Schema::dropIfExists('articles');
    }
}
