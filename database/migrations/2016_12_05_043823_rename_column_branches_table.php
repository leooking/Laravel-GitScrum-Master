<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnBranchesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('branches', function (Blueprint $table) {
            $table->renameColumn('name', 'title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('branches', function (Blueprint $table) {
            $table->renameColumn('title', 'name');
        });
    }
}
