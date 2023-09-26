<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function readDoc()
    {
        echo json_encode('test');
    }

    public function login(Request $request)
    {
        $credentials = [
            'login' => $request->login,
            'password' => $request->password,
        ];

        $query = DB::select('select * from `users` where `login` = :login', ['login' => $credentials['login']]);

        $passDb = '';

        foreach ($query as $item){
            $passDb = $item->passw;
        }

        if ($passDb == $credentials['password']){
            echo json_encode(true);
        }
        else {
            json_encode(false);
        }


    }
}
