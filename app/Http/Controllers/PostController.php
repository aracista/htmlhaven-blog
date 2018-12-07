<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Post;
use App\Category;

class PostController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $tags = Tag::orderBy('id','desc')->paginate(5);
        $categories = Category::orderBy('id','desc')->paginate(5);
        return view('post.index',compact('posts','tags','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $category = Category::all();
        $tags = Tag::all();
        $posts = Post::all();
        return view('post.create',compact('category','tags','posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'post'=>'required',
            'category_id'=> 'required',
            'image'=> 'required|image|mimes:jpeg,png,jpg'
        ]);
        $post = new Post;
        $post->title = $request->title;
        $post->slug   = str_slug($post->title);
        $post->post = $request->post;
        $post->category_id = $request->category_id;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = time().'_'.$file->getClientOriginalName();
            $destinationPath = public_path('/images');
            $file->move($destinationPath,$fileName);
            $post->image = $fileName;
        }

        $post->save();
        $post->tags()->sync($request->tags);
        return back()->withMessage('Post berhasil dibuat.....');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $tags = Tag::orderBy('id','desc')->paginate(5);
        $categories = Category::orderBy('id','desc')->paginate(5);
        $posts = Post::where('slug','=',$slug)->first();
        return view('post.show',compact('posts','tags','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $category = Category::all();
        $tags = Tag::all();
        return view('post.edit',compact('post','category','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $request->validate([
            'title'=>'required',
            'post'=>'required'
        ]);
        $post = Post::find($id);
        $post->title = $request->title;
        $post->post = $request->post;
        $post->category_id = $request->category_id;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = time().'_'.$file->getClientOriginalName();
            $destinationPath = public_path('/images');
            $file->move($destinationPath,$fileName);

            $oldFileName = $post->image;
            \Storage::delete($oldFileName);
            $post->image = $fileName;
        }

        $post->save();
        $post->tags()->sync($request->tags);
        return back()->withMessage('Post berhasil diedit.....');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return back()->withMessage('Post Berhasil Dihapus!!');
    }


}
