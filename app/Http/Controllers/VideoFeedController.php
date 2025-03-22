<?php

namespace App\Http\Controllers;

use App\Models\VideoFeed;
use Illuminate\Http\Request;

class VideoFeedController extends Controller
{
    public function getVideoFeed(Request $request) {

        $videos = VideoFeed::whereNeedsModeration(false)->get();
        
        return view('mainpage', compact('videos'));
    }
}
