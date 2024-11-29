<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $fillable = ['body', 'user_id', 'commentable_id', 'commentable_type', 'parent_id'];

    // Relación polimórfica con el modelo relacionado (Post, Video, etc.)
   // Relación polimórfica con Post o cualquier otro modelo
public function commentable(): MorphTo
{
    return $this->morphTo();
}

// Relación de respuesta con otros comentarios
public function replies(): HasMany
{
    return $this->hasMany(Comment::class, 'parent_id');
}

// Relación con el comentario padre
public function parent(): BelongsTo
{
    return $this->belongsTo(Comment::class, 'parent_id');
}

// Relación con el Usuario que hizo el comentario
public function user(): BelongsTo
{
    return $this->belongsTo(User::class);
}

}
