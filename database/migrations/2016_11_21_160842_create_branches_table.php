<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable()->index('fk_branches_user_id_idx');
            $table->integer('product_backlog_id')->unsigned()->nullable();
            $table->integer('sprint_id')->unsigned()->nullable();
            $table->string('sha')->nullable();
            $table->string('name')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('branches');
    }
}
