<?php

namespace App\Http\Controllers;
use App\Category;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->get();
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('post.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $post = Post::create($data);
        return redirect()->route('post.index')->with('message', 'add-success !');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('post.update', compact('post', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $category = Post::findOrFail($id);
        $category->update($data);
        return redirect()->route('post.index')->with('message', 'edit-success !');
    }

    public function delete($id)
    {
        $category = Post::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('message', 'delete-success !');
    }
    public function ajax_modal(Request $request){
        $categories = Category::all();
        if($request->ajax()){
            $html = view('component.modal_post', compact('categories'))->render();
            return response([
                'html' => $html
            ]);
        }

    }
    public function ajax_edit_modal(Request $request, $id){
        $categories = Category::all();
        $post = Post::findOrFail($id);
        if($request->ajax()){
            $html = view('component.modal_post_edit', compact('categories','post'))->render();
            return response([
                'html' => $html
            ]);
        }
    }
}
