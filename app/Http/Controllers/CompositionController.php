<?php


namespace App\Http\Controllers;


use App\Models\Composition;
use App\Models\Style;
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

        return json_encode($art);
    }

    public function getAllStyles(){
        $styles = new Style();

        return $styles::all('id', 'name');
    }

    public function updateListComposition(){
        return $this->article->getAllComposition();
    }

    public function editComposition(Request $request){

        $authorId = $request->idAuthor;
        $textId = $request->idText;
        $text = $request->text;

        return json_encode($this->article->editComposition($authorId, $textId, $text));
    }

    public function addComposition(Request $request){

        $text = $request->text;
        $idAuthor = $request->idAuthor;
        $title = $request->title;
        $style = $request->style;
        $date = date("Y-m-d H:i:s");

        $composition = $this->article;
        $lastId = $this->article::max('id') + 1;

        if($request->hasFile('file')){

            $file = $request->file('file');
            $fileName = $lastId . '.txt';

            $idAuthor = $request->idAuthor;

            $file->move(storage_path('app/articles/'.$idAuthor), $fileName);

        }
        else{
            $this->article->newCompositionText($idAuthor, $text, $lastId);
        }

        $composition->aid = $idAuthor;
        $composition->date = $date;
        $composition->title = $title;
        $composition->style = $style;
        $composition->save();

        return response()->json($composition);
    }
}
