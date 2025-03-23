<?php

namespace App\Http\Controllers;

use App\Models\VideoFeed;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ModerationController extends Controller
{

    public function getModerationVideoFeed(Request $request) {

        $videos = VideoFeed::with('user')
        ->whereNeedsModeration(true)
        ->orderBy('created_at', 'asc')
        ->get();


        
        return view('moderation', compact('videos'));
    }

    public function getRejectedVideoFeed(Request $request) {

        $videos = VideoFeed::with('user')
        ->whereNeedsModeration(true)
        ->orderBy('created_at', 'asc')
        ->get();


        
        return view('moderation', compact('videos'));
    }
    public function approve(VideoFeed $video): RedirectResponse
    {
        $video->needs_moderation = false;
        $video->save();

        return back()->with('success', 'Video approved!');
    }

    public function reject(VideoFeed $video): RedirectResponse
    {
        $video->delete();
        Storage::disk('public')->delete($video->thumbnail);
        Storage::disk('public')->delete($video->path);
        return back()->with('success', 'Video rejected and removed.');
    }
}
