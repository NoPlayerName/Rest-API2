<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentsResource;
use App\Models\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Comments::all();
        return new CommentsResource(true, 'Data berhasil ditampilkan', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Comments::create([
            'post_id' => $request->post_id,
        'user_id' => $request->user_id,
        'comments_content' => $request->comments_content,
        ]);

        return new CommentsResource(true, 'Data berhasil ditambahakan', $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comments $comments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Comments::where('id', $id)
                ->update([
                 'post_id' => $request->post_id,
                 'user_id' => $request->user_id,
                 'comments_content' => $request->comments_content,   
                ]);

            if($data){
                $message = 'Data behasil diupdate';
            }else{
                $message = 'Data gala diupdate';
            }

        return new CommentsResource(true, $message, $data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Comments::where('id', $id)->delete();

        return new CommentsResource(true, 'Data berhasil dihapus', $data);
    }
}
