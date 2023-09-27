<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();

        return new UserResource(true, 'Data behasil di dapatkan', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = User::create([
            'fristname' => $request->fristname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        if ($data) {
            $message = 'Data berhasil ditambahkan';
        }else {
            $message = 'Data gagal ditambahkan';
        }

        return new UserResource(true, $message, $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = User::where('id', $id)->update([
            'fristname' => $request->fristname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        if ($data) {
            $message = 'Data berhasil diubah';
        }else {
            $message = 'Data gagal diubah';
        }

        return new UserResource(true, $message, $data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = User::where('id', $id)->delete();

        if ($data) {
            $message = 'Data berhasil dihapus';
        }else{
            $message = 'Data berhasil dihapus';
        }

        return new UserResource(true, $message, $data);
    }
}
