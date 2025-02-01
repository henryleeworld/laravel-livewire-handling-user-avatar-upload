<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    #[Validate('required')]
    public $title;
    #[Validate('required')]
    public $post_text;
    #[Validate('required|image')]
    public $photo;

    public function render()
    {
        return view('livewire.posts.create');
    }

    public function submit()
    {
        $post = Post::create([
            'title' => $this->title,
            'post_text' => $this->post_text,
        ]);

        $this->photo->storeAs('photos', $post->id . '.' . $this->photo->extension());
        $post->update(['photo' => $post->id]);

        $this->reset();
    }
}
