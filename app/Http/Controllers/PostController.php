<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        /*  $category  = Category::find(1);

   //       $posts_cat = Post::where('category_id', $category->id)->get();
          $posts_cat = $category->posts;

          $post = Post::find(1);

          $tag = Tag::find(1);

          dd( $tag->posts);
   //       dd( $post->tags);*/

        return view('post.index', ['posts' => $posts]);
    }

    public function create()
    {

        $categories = Category::all();

        $tags = Tag::all();

        return view('post.create', compact('categories', 'tags'));
    }

    public function store()
    {


        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => ''
        ]);
        $tags = $data['tags'];
        unset($data['tags']);
//        dd($tags, $data);
        $post = Post::create($data);

        $post->tags()->attach($tags);

//        foreach ($tags as $tag){
//            PostTag::firstOrcreate(['post_id'=>$post->id,
//                'tag_id'=>$tag]);
//        }

        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags'=>''
        ]);
//      dd($data);
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);
        return redirect()->route('post.show', $post->id);
    }

    public function destroy(Post $post)
    {

        $post->delete();
        return redirect()->route('post.index');
    }

}
