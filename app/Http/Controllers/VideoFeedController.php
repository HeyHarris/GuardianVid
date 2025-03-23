<?php

namespace App\Http\Controllers;

use App\Models\VideoFeed;
use Illuminate\Http\Request;

class VideoFeedController extends Controller
{
    public function getVideoFeed(Request $request) {

        $videos = VideoFeed::with('user')
        ->whereNeedsModeration(false)
        ->orderBy('created_at', 'desc')
        ->get();


        
        return view('mainpage', compact('videos'));
    }
}
