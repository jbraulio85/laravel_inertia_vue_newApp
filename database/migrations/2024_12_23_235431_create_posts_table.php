<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('slug', 255);
            $table->string('date')->default(Carbon::now());
            $table->string('image', 100)->nullable();
            $table->text('text')->nullable();
            $table->text('description')->nullable();
            $table->enum('posted', ['yes', 'not'])->default('not');
            $table->enum('type', ['advert', 'post', 'course', 'movie'])->default('post');

            // Corrección: No especificar 'id', Laravel ya lo resuelve automáticamente.
            $table->foreignId('category_id')->constrained()->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
