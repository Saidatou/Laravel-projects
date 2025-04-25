<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class PostIndex extends Component
{
    public function deletePost($id)
    {
        $post = Post::findOrFail($id);
        Storage::disk('public')->delete($post->image);
        session()->flash('success','Post delete successfully.');
        $post->delete();
    }

    public function cleanSession()
    {
        session()->forget('success');
    }

    public function render()
    {

        return view('livewire.posts.post-index', [
            'posts' => auth()->user()->posts()->latest()->get()
        ]);
    }
}
