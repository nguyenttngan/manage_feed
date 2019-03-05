<?php

namespace App\Http\Controllers\API;

use App\Post;
use Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId = auth()->user()->id;
        $this->validate($request,[
            'title' => 'required|string|unique:posts',
            'description' => 'string',
            'content' => 'required|string'
        ]);
        $post = Post::create([
            'section_id' => $request['section_id'],
            'user_id' => $userId,
            'title' => $request['title'],
            'description' => $request['description'],
            'topic' => $request['topic'],
            'content' => $request['content']
        ]);
        return response()->json($post, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::where('id','=', $id)->with('comments','user')->first();
        foreach ($post->comments as $comment) {
            $comment->setAttribute('user',$comment->user);
        }
        return response()->json($post,200);
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
        //
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
        $post->delete();
        return response()->json(null, 204);
    }
    public function getPostBySectionID($section_id){
        $posts = Post::where('section_id',$section_id)->select(array('id', 'title','description'))->get();
        return response()->json($posts, 200);
    }
    public function uploadImage(Request $request){
        $this->validate($request, [
            // check validtion for image or file
            'upload' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);
        $image = $request->get('upload');
        return response()->json($request, 200);
//        $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
//        $imageUrl = public_path('images\\').$name;
//        Image::make($request->get('upload'))->save($imageUrl);
//        $data = [
//            'uploaded' => true,
//            'url' => $imageUrl,
//        ];
//        return response()->json($data, 200);
    }
}
