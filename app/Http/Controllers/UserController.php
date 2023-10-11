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

        $arrUser = [];
        $arrBook = [];

        foreach ($query as $item){
            $passDb = $item->passw;
            $arrUser = [
                'idUser' => $item->id,
                'nameUser' => $item->psname,
                'login' => $item->login
            ];
        }

        $bookList = DB::select('select `title` from `docs2` where `aid` = :aid', ['aid' => $arrUser['idUser']]);

        foreach ($bookList as $val){
           $arrBook[] = $val->title;
        }

        $arrUser['books'] = $arrBook;

        if ($passDb == $credentials['password']){
            echo json_encode($arrUser);
        }
        else {
            json_encode(false);
        }
    }
}
