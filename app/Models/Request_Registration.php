<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
        $turnItem = DB::select('select * from `request_registrations` where `idRequest` =:idRequest',
                                ['idRequest' => $idRequest]);

        return json_encode($turnItem);
    }
}
