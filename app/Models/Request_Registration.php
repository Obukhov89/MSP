<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Request_Registration extends Model
{
    protected $table = 'request_registrations';
    protected $fillable = [
        'login',
        'password',
        'name',
        'nick',
        'email',
        'aboutMe',
        'address',
        'link',
        'idRole',
        'status'
    ];

    public static function getTurn()
    {
        $arrRequest = [];

        $turnList = DB::select('select * from `request_registrations`
                     join `roles` on `request_registrations`.`idRole` = `roles`.`id` where `status` = "new"');

        foreach ($turnList as $list){
            $arrRequest[] = [
                'idRequest' => $list->idRequest,
                'name' => $list->name,
                'role' => $list->nameRole,
                'about' => $list->aboutMe
            ];
        }
        return json_encode($arrRequest);
    }

    public function saveRequest($idRequest)
    {
        $dataUser = [];
        $turnItem = DB::select('select * from `request_registrations` where `idRequest` =:idRequest',
                                ['idRequest' => $idRequest]);

        foreach ($turnItem as $item){
            $dataUser = [
                'name' => $item->name,
                'login' => $item->login,
                'password' => $item->password,
                'nikName' => $item -> nick,
                'email' => $item->email,
                'aboutMe' => $item->aboutMe,
                'address' => $item->address,
                'link' => $item->link,
                'idRole' => $item->idRole
            ];
        }

        $user = new User();

        $user->name = $dataUser['name'];
        $user->login = $dataUser['login'];
        $user->password = Hash::make($dataUser['password']);
        $user->nikName = $dataUser['nikName'];
        $user->email = $dataUser['email'];
        $user->aboutMe = $dataUser['aboutMe'];
        $user->address = $dataUser['address'];
        $user->link = $dataUser['link'];

        $user->save();

        $lastId = DB::select("select *  from `users` ORDER BY id DESC LIMIT 1");

        $maxId = 0;
        foreach ($lastId as $id){
            $maxId = $id->id;
        }

        $rightWrite = DB::table('users_and_roles')->insert(['idUser' => $maxId, 'idRole' => $dataUser['idRole']]);

        return json_encode($rightWrite);


    }
}
