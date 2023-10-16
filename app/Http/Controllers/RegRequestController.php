<?php


namespace App\Http\Controllers;


//use http\Env\Request;
use App\Models\Request_Registration;
use Illuminate\Http\Request;
class RegRequestController extends Controller
{
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

        $newRequest->save();

        echo json_encode($newRequest);
    }
}
