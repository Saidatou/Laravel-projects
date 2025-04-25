<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostIndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $posts = $request->user()->posts()->get();

        return Inertia::render('posts/index',[
            'posts'=> PostResource::collection($posts),

        ]);
    }
}
