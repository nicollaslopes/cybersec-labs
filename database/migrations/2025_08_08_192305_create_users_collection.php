<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::connection('mongodb')->create('users_mongo', function (Blueprint $collection) {
            $collection->index('user');
            $collection->string('user');
            $collection->string('password');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::connection('mongodb')->dropIfExists('users_mongo');
    }
};
