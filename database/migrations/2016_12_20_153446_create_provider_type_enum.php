<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProviderTypeEnum extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('provider', ['gitlab', 'github'])->default('github')->after('provider_id');
        });

        Schema::table('organizations', function (Blueprint $table) {
            $table->enum('provider', ['gitlab', 'github'])->default('github')->after('provider_id');
        });

        Schema::table('issues', function (Blueprint $table) {
            $table->enum('provider', ['gitlab', 'github'])->default('github')->after('provider_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('provider');
        });

        Schema::table('organizations', function (Blueprint $table) {
            $table->dropColumn('provider');
        });

        Schema::table('issues', function (Blueprint $table) {
            $table->dropColumn('provider');
        });
    }
}
