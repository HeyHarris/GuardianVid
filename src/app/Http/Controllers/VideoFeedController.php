<?php

namespace App\Http\Controllers;

use App\Models\VideoFeed;


class VideoFeedController extends Controller
{
    public function getVideoFeed()
    {

        $videos = VideoFeed::with('user')
            ->whereNeedsModeration(false)
            ->orderBy('created_at', 'desc')
            ->get();



        return view('mainpage', compact('videos'));
    }
}
