<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function showAllPost()
    {
        $allPosts['showAllPost'] = Post::get();

        return view('posts/posts')->with($allPosts);
    }

    public function showOnePost($id)
    {
        $onePost['showOnePost'] = Post::where('posts.id', $id)->first();

        return view('posts/post')->with($onePost);
    }

    public function addPostForm()
    {
        return view('posts/addPost');
    }

    public function addNewPost(Request $request)
    {
        $validation = $request->validate([
            'title' => 'required|max:190',
            'content' => 'required',
            'date' => 'required'
        ]);

        $nameOfImg = $request->imageUrl->getClientOriginalName();
        $newNameOfImage = time() . '-' . $nameOfImg;
        $request->imageUrl->move(public_path('postImage'), $newNameOfImage);

        $newPost = new Post();
        $newPost->fill($validation);
        $newPost->imageUrl = $newNameOfImage;
        $newPost->save();

        return view('posts/addPost');
    }

    public function editPostValue($id)
    {
        $onePost['showOnePost'] = Post::where('posts.id', $id)->first();

        return view('posts/edit')->with($onePost);
    }

    public function newPostValue(Request $request)
    {
        $validation = $request->validate([
            'title' => 'required|max:190',
            'content' => 'required',
            'date' => 'required',

        ]);

        $idOfRequest = $request->id;
        $editPostValue = Post::find($idOfRequest);
        $editPostValue->fill($validation);

        if (isset($request->imageUrl)) {
            $nameOfImg = $request->imageUrl->getClientOriginalName();
            $newNameOfImage = time() . '-' . $nameOfImg;
            $editPostValue->imageUrl = $newNameOfImage;
            $request->imageUrl->move(public_path('postImage'), $newNameOfImage);
        }
        $editPostValue->save();

        return redirect('posts');
    }

    public function deletePost(Request $request)
    {
        $id = $request->get('id');

        $deletePost = Post::where('id', $id)
            ->delete();

        return redirect('posts');
    }
}
