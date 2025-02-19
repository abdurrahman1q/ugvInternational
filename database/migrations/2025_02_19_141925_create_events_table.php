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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            
            $table->timestamp('start_date');
            $table->timestamp('end_date')->nullable();
            
            $table->string('venue_name')->nullable();
            $table->text('location')->nullable();
            $table->string('phone')->nullable();
            $table->string('website')->nullable();
            $table->json('social_links')->nullable();
            $table->text('map_embed_url')->nullable();
            
            $table->string('status')->default('Draft');
            $table->timestamp('published_at')->nullable();
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->string('image_path')->nullable();
            $table->json('images')->nullable();
            
            $table->timestamps();
        
            $table->index('slug');
            $table->index('status');
            $table->index('start_date');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
