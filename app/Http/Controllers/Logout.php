<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

class Logout
{
    public function logout() {
        Session::flush();
        return redirect('login');
    }
}
