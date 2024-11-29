<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
class HomePage extends Component
{

    public $posts;
    public function mount(){
        $this->posts = Post::all();
    }
    public function render()
    {
        return view('livewire.home-page',[
            'posts' => $this->posts
        ]);
    }
}
