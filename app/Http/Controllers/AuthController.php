<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function login(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only(['email', 'password']);

        // cek apakah data request dari user ada di DB
        if (!$token = Auth::attempt($credentials)) { // Jika email atau password salah / tidak ditemukan
            return response()->json([
                'code'    => 401,
                'status'  => false,
                'message' => 'Unauthorized',
                'data'    => []
            ], 401);
        }

        return $this->responsedWithToken($token); // jika email atau password ada / ditemukan
    }
}
