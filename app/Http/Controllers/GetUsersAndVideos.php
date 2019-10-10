<?php


namespace App\Http\Controllers;
use App\GetUsersVideo;

class GetUsersAndVideos extends Controller
{
    public function getUserDataAndVideos() {
        echo json_encode(GetUsersVideo::getUsersVideoData());
    }
}
