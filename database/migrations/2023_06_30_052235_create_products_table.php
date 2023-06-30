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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cate_id');
            $table->string('name');
            $table->mediumText('small_description');
            $table->text('description');
            $table->float('orginal_price');
            $table->float('selling_price');
            $table->string('image');
            $table->integer('qty');
            $table->integer('tax');
            $table->tinyInteger('status');
            $table->tinyInteger('trending');
            $table->string('meta_title');
            $table->string('meta_descrip');
            $table->string('meta_keywords');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
