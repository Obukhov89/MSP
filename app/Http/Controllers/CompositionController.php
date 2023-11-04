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

        return json_encode($this->article->editComposition($authorId, $textId, $text));
    }

    public function addComposition(Request $request){
        if($request->hasFile('file')){
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();

            $idAuthor = $request->idAuthor;

            $file->move(storage_path('app/articles/'.$idAuthor), $fileName);
            return response()->json(['message' => 'ok']);
        }
    }
}
