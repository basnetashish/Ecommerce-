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
        Schema::Table('users', function (Blueprint $table) {
            $table->enum('roles',['admin','user','editor'])->default('user')->after('email');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::Table('users', function (Blueprint $table) {
            $table->dropColumn('roles');
        });
       
    }
};
