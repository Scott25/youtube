<?php


namespace App;
use Illuminate\Support\Facades\DB;


class Videos
{
    public static function getVideo($user_id) {
        $value = DB::table('videos')->select(['video_link','video_info'])->where("user_id", $user_id)->get();
        return $value;
    }

    public static function uploadVideo($video_info, $user_id, $video_link) {
        DB::insert('insert into videos (video_link, video_info, user_id, published_date) values (?, ?, ?, ?)',
            [$video_link, $video_info, $user_id, date("Y/m/d")]);
    }

    public static function remove_video($user_id, $video_id) {
        DB::delete('delete from videos where video_link = ? and user_id = ?',[$video_id, $user_id]);
    }
}
