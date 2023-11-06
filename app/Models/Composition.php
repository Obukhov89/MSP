<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Composition extends Model
{
    protected $table = 'docs2';

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

    public function newCompositionText($idAuthor, $text, $newId)
    {
        $file = new FileModel();
        $newComposition = $newId.'.txt';
        $path = storage_path('app/articles/'. $idAuthor);

        if (!is_dir($path)) {
            mkdir($path);
        }
        return $file->createFile($path .'/'.$newComposition, $text);
    }

    public function editComposition($idAuthor, $idText, $text){
        $path = storage_path('app/articles/'.$idAuthor.'/'.$idText.'.txt');

        echo json_encode($idAuthor);

        $fh = fopen($path, 'w');

        $res = fwrite($fh, $text);
        fclose($fh);

        return $res;
    }

}
