<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class FileModel extends Model
{
    public function createFile($path, $content){

        $fn = fopen($path , 'w');
        $res = fwrite($fn, $content);
        fclose($fn);

        return $res;
    }
}
