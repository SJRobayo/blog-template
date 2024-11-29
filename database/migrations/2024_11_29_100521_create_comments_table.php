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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('body'); // El contenido del comentario
            $table->unsignedBigInteger('user_id'); // ID del usuario que hizo el comentario
            $table->morphs('commentable'); // Para la relación polimórfica (commentable_id y commentable_type)
            $table->unsignedBigInteger('parent_id')->nullable(); // Para la relación con el comentario padre (si es una respuesta)
            $table->timestamps();

            // Relaciones
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('parent_id')->references('id')->on('comments')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
