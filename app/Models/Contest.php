<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contest extends Model
{
    public function getAllContests()
    {
        $arrContests = [];

        $query = DB::select("select * from `contests` inner join `forms_composition`
                            on `contests`.`id_form` = forms_composition.`id` left join `projects`
                            on `contests`.`id_project` = `projects`.`id` where `contests`.`status` = 'active'");

        foreach ($query as $value){
            $dateStart = date("d-m-Y", strtotime($value->date_start));
            $dateEnd = date("d-m-Y", strtotime($value->date_end));

            $arrContests[] = [
                'countComposition' => $value->countComposition,
                'date_start' => $dateStart,
                'idContest' => $value->idContest,
                'date_end' => $dateEnd,
                'nameProject' => $value->nameProject,
                'name_form' => $value->name_form,
                'price' => $value->price
            ];

        }

        return $arrContests;
    }
}
