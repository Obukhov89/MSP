<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class UserController extends Controller
{
    public function userCSV()
    {
        $dataArr = [];
        $csv = fopen(__DIR__.'/users2.csv', "r");

        while ($data = fgetcsv($csv, null, ',')){

            $link = !empty($data[12]) ? $data[12] : '-';
            $email = !empty($data[9]) ? $data[9] : '-';
            $password = Hash::make($data[8]);
            $nikName = !empty($data[6]) ? $data[6] : 'No nik';

//            User::create([
//                'name' => $data[14],
//                'login' => $data[7],
//                'password' => $password,
//                'email' => $email,
//                'link' => $link,
//                'aboutMe' => $data[11],
//                'oldId' => $data[0],
//                'nikName' => $nikName,
//                'address' => $data[15]
//            ]);

            echo '<pre>';
            print_r($data);
            echo '</pre>';

        }
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
