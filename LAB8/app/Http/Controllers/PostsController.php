<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    
    public function getIndex() {
    	$posts=Post::all();

    	return view('welcome', [
    		'posts'=> $posts,
    		'edit_mode'=>0,
    		'edit_post'=>NULL
    	]);
    }

    public function postNew(Request $req){
    	$post=new Post([
    		'title'=>$req->input('title'),
    		'body'=>$req->input('body')
    	]);

    	$post->save();

    	return redirect()->back()->with('info', 'Post created!');
    }

    public function getDelete($id) {
    	$post=Post::find($id); //$post=Post::where('id','=', $id)->orderBy('id', 'desc')->first()

    	$post->delete();

    	return redirect()->back()->with('info', 'Post deleted!');
    }

    public function getEdit($id) {
    	$posts=Post::all();
    	$edit_post=Post::find($id);

    	return view('welcome', [
    		'posts'=> $posts,
    		'edit_mode'=>1,
    		'edit_post'=>$edit_post
    	]);
    }


    public function postEdit(Request $req){
    	$post=Post::find($req->input('id'));
    	$post->body=$req->input('body');

    	$post->save();


    	return redirect()->route('index')->with('info', 'Post updated!');
    }
}
