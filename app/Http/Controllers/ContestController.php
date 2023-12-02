<?php


namespace App\Http\Controllers;
use App\Models\Composition;
use App\Models\Contest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContestController extends Controller
{
    private Contest $contestObj;

    public function __construct(){
        $this->contestObj = new Contest();
    }

    public function getContestsList(){

        $project = new Project();

        return json_encode($project::all());
    }

    public function getFormComposition(){
        $composition = new Composition();

        return json_encode($composition->getFormComposition());
    }

    public function getAllContests(){
        return json_encode($this->contestObj->getAllContests());
    }

    public function setNewContest(Request $request)
    {
        $id = 0;
        $contest = $this->contestObj;

        $contest->status = 'active';
        $contest->date_start = $request->date_start;
        $contest->date_end = $request->date_end;
        $contest->id_form = $request->form_id;
        $contest->price = $request->price_contest;

        if ($request->idProject == 0){
            $id = DB::table('projects')->insertGetId([
               'nameProject' => $request->nameContest
            ]);
        }else{
            $id = $request->idProject;
        }
        $contest->id_project = $id;

        $contest->save();

        return $contest;
    }

    public function reqReadyCompCont(Request $request)
    {
      return  DB::table('contest_steps')->insert([
                'idContest' => $request->idContest,
                'idAuthor' => $request->idAuthor,
                'idComposition' => $request->idComposition
            ]);
    }

}
