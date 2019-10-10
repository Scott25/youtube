<?php


namespace App\Http\Controllers;
use App\Videos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserDetails extends  Controller
{
    public function index() {
        if(Session::get("user_type") === 0 && Session::get("logged_in") === 1) {
            return view("UserDetails");
        }
        return redirect('login');
    }

    public function admin() {
        if(Session::get("user_type") === 1 && Session::get("logged_in") === 1) {
            return view("AdminPage");
        } else {
            return redirect('login');
        }
    }

    public function fetchVideos() {
        if(Session::get("user_type") === 0) {
            if(Session::get("user_id") != null ) {
                $userData = Videos::getVideo(Session::get("user_id"));
            }
        }
        echo json_encode($userData);
    }

    public function getSelectedUserVideos(Request $request) {
        $user_id = $request->input('userId');
        $userData = Videos::getVideo($user_id);
        echo json_encode($userData);
    }
}
