<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginUser(Request $request)
    {
        // Check if login is correct
        $userData = User::checkUserEsists($request->input('email'), md5($request->input('password')));
        if(!isset($userData[0])) {
            echo 0;
        } else if($userData[0]->user_type == 0) {
            Session::put('logged_in', 1);
            Session::put('user_id', ($userData[0]->id));
            Session::put('user_type', 0);
            echo 1;
        } else if($userData[0]->user_type == 1) {
            Session::put('logged_in', 1);
            Session::put('user_id', ($userData[0]->id));
            Session::put('user_type', 1);
            echo 2;
        }
    }
}
