<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('favoriteable_type', 45)->nullable();
            $table->integer('favoriteable_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable()->index('fk_favorites_user_id_idx');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('favorites');
    }
}
