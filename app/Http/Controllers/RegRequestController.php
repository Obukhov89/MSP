<?php


namespace App\Http\Controllers;


//use http\Env\Request;
use App\Models\Request_Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegRequestController extends Controller
{
    private Request_Registration $requestObj;

    public function __construct()
    {
        $this->requestObj = new Request_Registration();
    }

    public function createRequest(Request $request)
    {
        $newRequest = new Request_Registration();


        $arrData = [
            'login' => $request->login,
            'password' => $request->password,
            'name' => $request->name,
            'nick' => $request->nick,
            'email' => $request->email,
            'aboutMe' => $request->aboutMe,
            'address' => $request->address,
            'link' => $request->link,
            'role' => $request->role,
            'status' => 'new'
        ];

        $newRequest->name = $arrData['name'];
        $newRequest->login = $arrData['login'];
        $newRequest->password = $arrData['password'];
        $newRequest->nick = $arrData['nick'];
        $newRequest->email = $arrData['email'];
        $newRequest->aboutMe = $arrData['aboutMe'];
        $newRequest->address = $arrData['address'];
        $newRequest->link = $arrData['link'];
        $newRequest->idRole = $arrData['role'];
        $newRequest->status = $arrData['status'];

        $this->requestObj->save();

        echo json_encode($newRequest);
    }

    public function getTurnRequest()
    {
       return $this->requestObj->getTurn();
    }

    public function save(Request $request)
    {
        $idRequest = $request->idRequest;

        return $this->requestObj->saveRequest($idRequest);
    }
}
