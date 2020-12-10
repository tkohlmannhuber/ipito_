<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $AllPosts = Post::all();

        return response()->json($AllPosts);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Post = new Post();
        $Post->title = $request->get('title');
        $Post->spot = $request->get('spot');
        $Post->content = $request->get('content');
        $Post->user_id = $request->get('userId');

        if ($image = $request->file('image')) {
            $name = Str::random(16) . '.' . $image->getClientOriginalExtension();
            $image->storePubliclyAs('public/images', $name);
            $Post->image_path = $name;
        }
        $Post->save();

        // nimm alle bestehenden Posts (inkl. dem neuen Post) und gib sie zurück
        $AllPosts = Post::all();

        return response()->json($AllPosts);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Post = Post::findOrFail($id);

        return response()->json($Post);

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
        // such den gewünschten Post und gib ihn zurück
        $Post = Post::findOrFail($id);

        // speicher den Beitrag mit geänderten Werten vom Request
        $Post->title = $request->get('title');
        $Post->teaser = $request->get('teaser');
        $Post->content = $request->get('content');
        $Post->save();

        return response()->json($Post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // such den gewünschten Post und lösche ihn
        $Post = Post::findOrFail($id);
        $Post->delete();

        // Nun geben wir alle Posts ohne diesen Post zurück
        $AllPosts = Post::all();
        return response()->json($AllPosts);
    }
}
