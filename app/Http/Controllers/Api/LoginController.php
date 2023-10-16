<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), 
        [
            'email' => 'required',
            'password' => 'required|min:8'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }else{
            // $data = [
            //     'email' => $request->email,
            //     'password' => $request->password,
            // ];
            
            $credentials = $request->only('email', 'password');

            if (!$token = auth()->guard('api')->attempt($credentials)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Password Anda salah'
                ], 401);
            }else{
                return response()->json([
                    'success' => true,
                    'user' => auth()->guard('api')->user(),
                    'token' => $token
                ], 200);
            }
        }

       

        
    }
}
