<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\apointment;
use App\Models\User;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function createUserAppointment(Request $request){
        $request->validate([
            'subject' => 'required|string|max:255',
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
        ]);

        $todo = apointment::create([
            'subject' => $request->subject,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
    }

    public function getAppointment(Request $request){
        $appo = apointment::all();
        return $appo;
    }

    //create Doctor
    public function getDoctors(){
        $doc = User::select()->where('role','=','doctor')->get();
        return $doc;
    }
}
