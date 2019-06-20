<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Post;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(20);
        return view('posts.index')
            ->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = auth()->user()->id;
        $post->views = 0;
        if ($request->hasFile('file_1')) {
            $post->file_1 = $request->file('file_1')->getClientOriginalName();
            $request->file('file_1')->storeAs('', $request->file('file_1')->getClientOriginalName());
        }
        if ($request->hasFile('file_2')) {
            $post->file_2 = $request->file('file_2')->getClientOriginalName();
            $request->file('file_2')->storeAs('', $request->file('file_2')->getClientOriginalName());
        }
        if ($request->hasFile('file_3')) {
            $post->file_3 = $request->file('file_3')->getClientOriginalName();
            $request->file('file_3')->storeAs('', $request->file('file_3')->getClientOriginalName());
        }
        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $post_key = "post_" . $post->id;
        if (!session($post_key)) {
            $array['views'] = $post->views + 1;
            $post->update($array);
        }
        session([$post_key => '1']);
        return view('posts.show')
            ->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->authorize('update', $post);
        return view('posts.edit')
            ->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $this->authorize('update', $post);
        $post->title = $request->title;
        $post->content = $request->content;
        if ($request->hasFile('file_1')) {
            Storage::delete($post->file_1);
            $post->file_1 = $request->file('file_1')->getClientOriginalName();
            $request->file('file_1')->storeAs('', $request->file('file_1')->getClientOriginalName());
        }
        if ($request->hasFile('file_2')) {
            Storage::delete($post->file_2);
            $post->file_2 = $request->file('file_2')->getClientOriginalName();
            $request->file('file_2')->storeAs('', $request->file('file_2')->getClientOriginalName());
        }
        if ($request->hasFile('file_3')) {
            Storage::delete($post->file_3);
            $post->file_3 = $request->file('file_3')->getClientOriginalName();
            $request->file('file_3')->storeAs('', $request->file('file_3')->getClientOriginalName());
        }
        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $this->authorize('delete', $post);
        if ($post->file_1 != null) {
            Storage::delete($post->file_1);
        }
        if ($post->file_2 != null) {
            Storage::delete($post->file_2);
        }
        if ($post->file_3 != null) {
            Storage::delete($post->file_3);
        }
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function download($file)
    {
        $file = public_path('uploads' . '\\' . $file);
        return response()->download($file);
    }

    public function deleteFile($id, $index)
    {
        $post = Post::findOrFail($id);
        switch ($index) {
            case 1:
                Storage::delete($post->file_1);
                $post->file_1 = null;
                $post->save();
                break;
            case 2:
                Storage::delete($post->file_2);
                $post->file_2 = null;
                $post->save();
                break;
            case 3:
                Storage::delete($post->file_3);
                $post->file_3 = null;
                $post->save();
                break;
        }
        return redirect()->route('posts.edit', $post);
    }
}