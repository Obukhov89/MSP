<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Composition extends Model
{
    public function getArticle($idAuthor, $idText){
        $path = storage_path('app/articles/'.$idAuthor.'/'.$idText.'.txt');

        $text = '';

        $fh = fopen($path, 'r');

        while (!feof($fh)) {
            $line = fgets($fh);
            $text .= $line . PHP_EOL;
        }
        fclose($fh);

        return json_encode($text);
    }

    public function editComposition($idAuthor, $idText, $text){
        $path = storage_path('app/articles/'.$idAuthor.'/'.$idText.'.txt');

        echo json_encode($idAuthor);
//        return file_exists($path);
        $fh = fopen($path, 'w');

        $res = fwrite($fh, $text);
        fclose($fh);

        return $res;
    }

}