<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use App\Models\Category;

class PostEditor extends Component
{
    use WithFileUploads;
    public $editor = false;
    public $title;
    public $content;
    public $category_id;
    public $categories;
    public $category1;
    public $category2;
    public $category3;

    public  $image;
    public $user_id;
    public Post $post;

    public $rules = [
        'title' => 'required|min:6',
        'content' => 'required|min:6',
        'category1' => 'nullable|exists:categories,id',
        'category2' => 'nullable|exists:categories,id',
        'category3' => 'nullable|exists:categories,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    public $messages = [
        'title.required' => 'The title field is required',
        'title.min' => 'The title must be at least 6 characters',
        'content.required' => 'The content field is required',
        'content.min' => 'The content must be at least 6 characters',
        'category_id.required' => 'The category field is required',
        'category_id.exists' => 'The selected category does not exist'
    ];

    public function mount($id = null)
    {
        $this->categories = Category::all();
        $this->user_id = Auth::user()->id;

        if ($id) {
            $this->editor = true;
            $this->post = Post::findOrFail($id); // Cargar el post por id
            $this->title = $this->post->title;
            $this->content = $this->post->content;

            $categories = $this->post->categories->pluck('id')->toArray();
            $this->category1 = $categories[0] ?? null;
            $this->category2 = $categories[1] ?? null;
            $this->category3 = $categories[2] ?? null;
        }
    }
    public function render()
    {
        return view('livewire.create-post');
    }

    public function save()
    {
       $this->validation();

    }

    public function validation(){
        $this->validate();

        // Recoger las categorías seleccionadas, ignorando valores vacíos
        $selectedCategories = array_filter([$this->category1, $this->category2, $this->category3]);

        // Verificar que no se seleccionen más de 3 categorías
        if (count($selectedCategories) > 3) {
            dd('error', 'You can only select up to 3 categories.');
            return;
        }
        if (count($selectedCategories) < 1) {
            dd('error', 'You must select at least one category.');
            return;
        }

        // Verificar que no se repitan categorías
        if (count($selectedCategories) !== count(array_unique($selectedCategories))) {
            dd('error', 'You cannot select duplicate categories.');
            return;
        }

        if ($this->editor) {
            $this->updatePost($selectedCategories);
        } else {
            $this->createPost($selectedCategories);
        }

    }

    public function createPost($selectedCategories){

            // Intentamos validar los datos

            $path = $this->image ? $this->image->store('images', 'public') : null;
            // Crear el post
            $this->post = Post::create([
                'title' => $this->title,
                'content' => $this->content,
                'user_id' => $this->user_id,
                'image' => $path,
            ]);


            $this->post->categories()->attach($selectedCategories);

            // Mostrar mensaje de éxito y redirigir al dashboard
            session()->flash('message', 'Post created successfully');
            return redirect()->route('dashboard');
        }


    public function updatePost($selectedCategories){
        $path = $this->image ? $this->image->store('images', 'public') : null;
        // Crear el post
        $this->post->update([
            'title' => $this->title,
            'content' => $this->content,
            'user_id' => $this->user_id,
            'image' => $path,
        ]);
        $this->post->categories()->sync($selectedCategories);

        // Mostrar mensaje de éxito y redirigir al dashboard
        session()->flash('message', 'Post created successfully');
        return redirect()->route('dashboard');
    }

    public function deletePost($id){

    $post = Post::findOrFail($id);

    // Eliminar las relaciones en la tabla intermedia (category_post)
    $post->categories()->detach();

    // Ahora puedes eliminar el post
    $post->delete();

    return redirect()->route('dashboard')->with('message', 'Post deleted successfully');
    }

    public function cancel(){
        return redirect()->route('user.posts');
    }
}
