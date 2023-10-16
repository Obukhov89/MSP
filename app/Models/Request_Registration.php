<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

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
}
