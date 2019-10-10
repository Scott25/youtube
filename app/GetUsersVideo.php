<?php

namespace App;
use Illuminate\Support\Facades\DB;

class GetUsersVideo
{
    public static function getUsersVideoData() {
        return DB::table("users")
            ->select(['videos.user_id', DB::raw('count(*) as total'), "users.fname", "users.lname", "users.id"])
            ->join('videos', 'videos.user_id', '=', 'users.id', "left")
            ->where("users.user_type", 0)
            ->groupBy(['videos.user_id', "users.fname", "users.lname", "users.id"])->get();
    }
}
