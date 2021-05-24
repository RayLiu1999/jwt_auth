<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()   // 呼叫controller時可以先載入middleware
    {
        $this->middleware('auth:api', ['except' => 'login', 'register']);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (!$token = auth()->attempt($validator->validated())) {
            return response()->json(['status' => 1,'message' =>'無效的驗證'], 401);
        }
        
        return response()->json(['status' => 0, 'token' => $token]);
    }

    public function register()
    {

    }

    public function user()
    {
        return response()->json([auth()->user()]);
    }

    public function logout()
    {
        // auth()->logout();

        return response('登出成功');
    }
}
