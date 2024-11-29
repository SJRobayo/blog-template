<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use App\Models\Category;

class UserPosts extends Component
{
    public $posts;
    public function mount()
    {
        $this->posts = Post::where('user_id', Auth::user()->id)->get();

    }
    public function render()
    {
        return view('livewire.user-posts', [
            'posts' => $this->posts
        ]);
    }

    
}
