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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->json('images');
            $table->longText('content');
            $table->integer('views')->default(0);
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->longText('meta_keywords')->nullable();
            $table->longText('meta_description')->nullable();
            $table->timestamps();
        });

        Schema::create('article_category', function (Blueprint $table) {
            $table->id();
            $table->foreignId('article_id')->constrained('articles')->cascadeOnDeleteonDelete();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDeleteonDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
