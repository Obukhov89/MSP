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
        $arrRoles = [];

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

                $roleList = DB::select('select `idRole` from `users_and_roles` where `idUser` = :idUser',
                                                                                ['idUser' => $arrUser['idUser']]);

                foreach ($roleList as $rol){
                    $arrRoles[] = $rol->idRole;
                }

                $arrUser['books'] = $arrBook;
                $arrUser['roles'] = $arrRoles;

                echo json_encode($arrUser);
            }
            else{
                json_encode(false);
            }

        }
    }
}
