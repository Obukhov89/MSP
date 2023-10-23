<?php


namespace App\Http\Controllers;


use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    private Article $article;

    public function __construct()
    {
        $this->article = new Article();
    }

    public function getArticle(Request $request)
    {
        $authorId = $request->authorId;
        $textId = $request->textId;

       $art =  $this->article->getArticle($authorId, $textId);

       return json_decode($art);
    }
}
