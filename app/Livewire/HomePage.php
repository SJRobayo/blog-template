<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class HomePage extends Component
{

    public $posts;
    public function mount(){
        $this->posts = Post::where('id', '!=', Auth::id())->get();
    }
    public function render()
    {
        return view('livewire.home-page',[
            'posts' => $this->posts
        ]);
    }
}
