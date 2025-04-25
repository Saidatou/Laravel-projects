<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostStoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'title'=>'required',
            'content'=>'required',
            'image'=>'required|image',
         ]);

        $data['slug'] = str($data['title'])->slug();

        if($request->hasFile('image')){
            //or  $data['image'] = $request->file('image')->store('posts', 'public');
            $data['image'] = Storage::disk('public')->put('posts', $request->file('image'));
        }

        $request->user()->posts()->create($data);
        return to_route('posts.index')->with('success','Post created successfully.');
    }
}
