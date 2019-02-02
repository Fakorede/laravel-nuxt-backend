<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Resources\Post as PostResource;
// use Illuminate\Http\Request;
use App\Post;
use App\Topic;

class PostController extends Controller
{
    public function store(StorePostRequest $request, Topic $topic) {
        $post = new Post;
        $post->body = $request->body;
        $post->user()->associate($request->user());

        // save post to topic
        $topic->posts()->save($post);
        return new PostResource($post);
    }
}
