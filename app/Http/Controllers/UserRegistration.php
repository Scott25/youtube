<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CreateNewUser;

class UserRegistration
{
    public function index() {
        return view("registration");
    }

    public function newUser(Request $request) {
        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $password = md5($request->input('password'));
        $email = $request->input('email');
        CreateNewUser::registerNewUser($fname, $lname, $email, $password);
    }
}
