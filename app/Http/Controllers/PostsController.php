<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Http\Request;
use Nette\Utils\Image;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()

    {
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);

        return view('posts.index',compact('posts'));
    }



    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        //return view('posts.store');
        $data = request()->validate([
            //'another' => '',
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);
       /** $post = new \App\Models\Post();
       * $post -> caption = $data ['caption'];
       * $post -> save();
       **/

        $imagePath=request('image')->store('uploads','public');

        $image = \Intervention\Image\Facades\Image::make(public_path("storage/{$imagePath}"))->fit(300,300);
        $image->save();


        auth()->user()->posts()->create([
            'caption'=>$data['caption'],
            'image' => $imagePath,
        ]);


        //\App\Models\Post::create($data);
        //dd(request()->all());

        return redirect('/profile/' . auth()->user()->id);

    }

    public function show(\App\Models\Post $post)
    {
        return view('posts.show', compact('post'));
    }

}
