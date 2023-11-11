<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'login',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function login($arrData){


        $query = DB::select('select * from `users` where `login` = :login', ['login' => $arrData['login']]);

        $passDb = '';

        $arrUser = [];
        $arrBook = [];
        $arrRoles = [];

        foreach ($query as $item){
            if (Hash::check($arrData['password'], $item->password)){
                $arrUser = [
                    'idUser' => $item->id,
                    'nameUser' => $item->name,
                    'login' => $item->login,
                    'oldId' => $item->oldId
                ];

                $bookList = DB::select('select `title`, `id` from `docs2` where `aid` = :aid', ['aid' => $arrUser['idUser']]);
                foreach ($bookList as $val){
                    $arrBook[] =
                        [
                          'textId' => $val->id,
                          'textTitle' => $val->title
                        ];
                }

                $roleList = DB::select('select `idRole` from `users_and_roles` where `idUser` = :idUser',
                    ['idUser' => $arrUser['idUser']]);

                foreach ($roleList as $rol){
                    $arrRoles[] = $rol->idRole;
                }

                $arrUser['books'] = $arrBook;
                $arrUser['roles'] = $arrRoles;


                return json_encode($arrUser);
            }
            else
            {
                return false;
            }

        }
    }
}
