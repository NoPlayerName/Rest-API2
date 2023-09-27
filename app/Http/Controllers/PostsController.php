<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Posts::all();
        return new PostResource(true, 'List Data Posts', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Posts::create(
            [      
                'tittle' => $request->tittle,
                'news_content' => $request->news_content,
                'author' => $request->author,
            ]
        );

        
        return new PostResource(true, 'Data Berhasil ditambahakan', $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Posts $posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Posts::where('id', $id)->update([
            'tittle' => $request->tittle,
            'news_content' => $request->news_content,
            'author' => $request->author,
        ]);

        if ($data) {
            $message = 'Data Berhasil Diedit';
        }else {
            $message = 'Data gagal diedit';
        }

        return new PostResource(true, $message, $data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Posts::where('id', $id)->delete();

        return new PostResource(true, 'Data berhasil didelete', $data);
    }
}
