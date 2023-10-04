<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
            'lastname'      => 'requiured',
            'email'         => 'required|email|unique:users',
            'username'      => 'required',
            'password'      => 'required|min:8|confirmed',
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
                'password'      => Hased::make($request->password),
            ]);
    }
}
