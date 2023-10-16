<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(),
        [
            'fristname'     => 'required',
            'lastname'      => 'required',
            'email'         => 'required|email|unique:users',
            'username'      => 'required',
            'password'      => 'required|min:8|confirmed'
        ]);
        
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::create(
            [
                'fristname'     => $request->fristname,
                'lastname'      => $request->lastname,
                'email'         => $request->email,
                'username'      => $request->username,
                'password'      => bcrypt($request->password),
            ]);

            if ($user) {
                return response()->json([
                    'success' => true,
                    'user'=> $user,
                ], 201);
            }

            return response()->json(
                [
                    'success' => false,
                ], 409);
    }
}
