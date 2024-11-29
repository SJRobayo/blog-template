<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostVisualizer extends Component
{
    public $comment;
    public Post $post;
    public $userId;
    protected $fillable = ['body', 'user_id', 'commentable_id', 'commentable_type', 'parent_id'];

    protected $rules = [
        'comment' => 'required|min:3'
    ];

    protected $messages = [
        'comment.required' => 'El campo comentario es requerido',
        'comment.min' => 'El comentario debe tener al menos 3 caracteres',
    ];

    public function mount($id)
    {
        $this->userId = Auth::id();
        $this->post = Post::findOrFail($id); // Usar findOrFail para manejo seguro
    }

    public function render()
    {
        return view('livewire.post-visualizer', ['post' => $this->post]);
    }

    public function postComment()
    {
        $this->validate();

        $this->post->comments()->create([
            'body' => $this->comment,
            'user_id' => Auth::id(),
            'commentable_id' => $this->post->id,
            'commentable_type' => Post::class,
            'parent_id' => null,
        ]);
        $this->reset('comment');
        session()->flash('message', 'Comentario creado exitosamente.');
        return redirect()->route('post.visualize', ['id' => $this->post->id]);
    }
}
