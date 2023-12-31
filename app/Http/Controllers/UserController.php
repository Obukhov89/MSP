<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function readDoc()
    {
        echo json_encode('test');
    }

    public function login(Request $request)
    {
        $user = new User();

        if (!empty($request)){
            $credentials = [
                'login' => $request->login,
                'password' => $request->password,
            ];

            return $user->login($credentials);
        }
    }
}
