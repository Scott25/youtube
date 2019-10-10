<?php


namespace App;
use Illuminate\Support\Facades\DB;

class CreateNewUser
{
    public static function  registerNewUser($email, $fname, $lname, $password) {
        $value = DB::table('users')->where("email", $email)->where("password", $password)->get();
        DB::insert('insert into users (fname, lname, email, 	password, user_type) values (?, ?, ?, ?, ?)',
            [$fname, $lname, $email, $password, 0]);
    }
}
