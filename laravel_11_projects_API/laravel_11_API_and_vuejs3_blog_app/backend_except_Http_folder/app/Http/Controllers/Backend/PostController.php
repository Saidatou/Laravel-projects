<?php

namespace App\Http\Controllers\Backend;

use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $user= Auth::user();
        $posts = auth()->user()->posts()->orderBy("created_at", 'desc');
        // $posts = $user->posts()->orderBy("created_at", 'desc');


        return response()->json($posts);

    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string','max:255'],
            'body'=> ['required','string'],
        ]);

        $data['slug'] = Str::slug($data['title']);

        // $user = Auth::user();

        // $user()->posts()::create($data);
        auth()->user()->posts()::create($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Post created successfully',
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
