<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id',$users)->with('user')->latest()->paginate(5);
        // dd($posts);
        return view('posts.index',compact('posts'));
    }
    public function create()
    {
        return view('posts.create');
    }
    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image'=>['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
        ]); 
        
        #To add image to our AWS S3 Bucket
        // request('image')->store('uploads','s3');
        #To add image to our local storage
        $imagePath = request('image')->store('uploads','public');
        #Not advisable coz user can directly sql inject the feilds to db
        //\App\Post::create(request()->all());
        
        #To add data to database
        //\App\Post::create($data);
        // auth()->user()->posts()->create($data);
        auth()->user()->posts()->create([
            'caption'=>$data['caption'],
            'image'=>$imagePath,
        ]);
        
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();
        #Output the posted data on screen and die 
        // dd(request()->all());
        
        // return view('post.create');
        return redirect('/profile/'.auth()->user()->id);
    }
    public function show( \App\Post $post)
    {
        // dd($post);
        #Return view
        // return view('posts.show');
        #Return View and pass data to view from controller
        // return view('posts.show',['post'=>$post]);
        
        #Return View and pass data to view from controller using compact method
        return view('posts.show',compact('post'));
    }
}