<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Videos;

class VideoUpload extends Controller
{
    public function upload(Request $request) {
        $get_user_id = $request->input('user_id');
        $url = file_get_contents("https://www.youtube.com/oembed?url=" . $request->input('video_link') . "&format=json");
        $decoded_data =  json_decode($url);
        $author_name = $decoded_data->author_name;
        $video_title = $decoded_data->title;
        $video_code = explode("v=", $request->input('video_link'));
        $video_code = $video_code[1];
        $video_info = $video_title . " " . "|" . $author_name;
        Videos::uploadVideo($video_info, $get_user_id, $video_code);
    }

    public function delete_video(Request $request) {
        $user_id =  $request->input('user_id');
        $video_id = $request->input('video_link');
        Videos::remove_video($user_id, $video_id);
    }
}
