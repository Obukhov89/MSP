<?php


namespace App\Http\Controllers;


use App\Models\Composition;
use Illuminate\Http\Request;

class CompositionController extends Controller
{
    private Composition $article;

    public function __construct()
    {
        $this->article = new Composition();
    }

    public function getArticle(Request $request)
    {
        $authorId = $request->authorId;
        $textId = $request->textId;

       $art =  $this->article->getArticle($authorId, $textId);

       return json_decode($art);
    }

    public function editComposition(Request $request){

        $authorId = $request->idAuthor;
        $textId = $request->idText;
        $text = $request->text;

        return $this->article->editComposition($authorId, $textId, $text);
    }
}
