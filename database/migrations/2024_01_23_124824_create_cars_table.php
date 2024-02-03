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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('carTitle',100);
            $table->string('price',100);
            $table->text('shortdescription',100);
            $table->text('description');
            $table->string('luggage',100);
            $table->string( 'doors',100);
            $table->string('passenger',100);
            $table->boolean('active');
            $table->string('image', 100);
            $table->foreignId('category_id')->constrained('categories');    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
