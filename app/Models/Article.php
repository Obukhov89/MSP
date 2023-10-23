<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Article extends Model
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

}
