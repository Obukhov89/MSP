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
        $credentials = [
            'login' => $request->login,
            'password' => $request->password,
        ];

        $query = DB::select('select * from `users` where `login` = :login', ['login' => $credentials['login']]);

        $passDb = '';

        $arrUser = [];
        $arrBook = [];

        foreach ($query as $item){
            if (Hash::check($credentials['password'], $item->password)){
                $arrUser = [
                    'idUser' => $item->id,
                    'nameUser' => $item->name,
                    'login' => $item->login,
                    'oldId' => $item->oldId
            ];

                $bookList = DB::select('select `title` from `docs2` where `aid` = :aid', ['aid' => $arrUser['oldId']]);
                foreach ($bookList as $val){
                    $arrBook[] = $val->title;
                }
                $arrUser['books'] = $arrBook;

                echo json_encode($arrUser);
            }
            else{
                json_encode(false);
            }

        }
    }
}
