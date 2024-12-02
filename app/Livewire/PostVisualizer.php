<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostVisualizer extends Component
{
    public $comment;
    public Post $post;
    public $userId;
    public $commentId;

    public $commentReplies = [];
    protected $fillable = ['body', 'user_id', 'commentable_id', 'commentable_type', 'parent_id'];

    public $reply;
    protected $rules = [
        'comment' => 'required|min:3',

    ];

    protected $messages = [
        'comment.required' => 'El campo comentario es requerido',
        'comment.min' => 'El comentario debe tener al menos 3 caracteres',
    ];

    public function mount($id)
    {
        $this->userId = Auth::id();
        $this->post = Post::find($id);
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
    public function replyComment($id)
    {
        try {

            $this->validate([
                'reply' => 'required|string|max:1000',
            ]);

            $this->commentId = $id;


            Comment::create([
                'body' => $this->reply,
                'user_id' => Auth::id(),
                'commentable_id' => $this->commentId,
                'commentable_type' => Comment::class,
                'parent_id' => $this->commentId,
            ]);


            $this->reset('comment');

            session()->flash('message', 'Respuesta creada exitosamente.');

            return redirect()->route('post.visualize', ['id' => $this->post->id]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }




    public function showReplies($commentId)
{
    if (isset($this->commentReplies[$commentId])) {
        $this->commentReplies[$commentId] = !$this->commentReplies[$commentId];
    } else {
        $this->commentReplies[$commentId] = true;
    }
}

    public function nothing()
    {
        dd(1);
    }
}
