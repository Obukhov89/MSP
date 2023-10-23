<?php


namespace App\Http\Controllers;


class ArticleController extends Controller
{
    public function getArticle(){
        $path = storage_path('app/articles/2/27683.txt');
        $text = '';
        $file = file_get_contents($path);
        $fh = fopen($path, 'r');

        while (!feof($fh)) {
            $line = fgets($fh);
            $text .= $line . PHP_EOL;
        }
        fclose($fh);

        echo json_encode($text);
    }
}
