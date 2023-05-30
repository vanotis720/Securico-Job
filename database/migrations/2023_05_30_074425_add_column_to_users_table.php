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
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name', 25);
            $table->string('last_name', 25)->nullable();
            $table->enum('sex', ['M','F']);
            $table->boolean('first_login')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->removeColumn('first_name');
            $table->removeColumn('last_name');
            $table->removeColumn('sex');
            $table->removeColumn('first_login');
        });
    }
};
