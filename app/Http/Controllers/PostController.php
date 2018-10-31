<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Post;
use Storage;

class PostController extends Controller
{
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        if ($post) {
            $imagePath = Storage::url($post->featured_image);
            return view('post', [
                'post' => $post,
                'imagePath' => $imagePath,
            ]);
        }

        // No match was found
        abort(404);
    }
}
