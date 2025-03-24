<?php

namespace App\Http\Controllers;

use App\Models\VideoFeed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class UsersUploadsController extends Controller
{
    public function getUserUploadsFeed() {
        $videos = VideoFeed::ownedBy(auth()->id())
        ->orderBy('created_at', 'desc')
        ->get();

        return view('useruploads', compact('videos'));
    }

    public function createEdit($videoId)
    {
       
    $editVideo = VideoFeed::where('id', $videoId)
    ->firstOrFail();

    return view('editupload', compact('editVideo'));
    }

    public function edit(Request $request, VideoFeed $video) {
        DB::beginTransaction();

        $uploadVideoFields = $request->validate([
            'title'       => ['required', 'string', 'min:1'],
            'description' => ['required', 'string'],
            'thumbnail'   => ['nullable', 'image', 'max:2048'],
        ]);
try {
        if ($request->hasFile('thumbnail')) {
            Storage::disk('public')->delete($video->thumbnail);
    
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
    
            $video->thumbnail = $thumbnailPath;
        }

        $video->title = $uploadVideoFields['title'];
        $video->description = $uploadVideoFields['description'];
        $video->needs_moderation = true;

        $video->save();
        DB::commit();

        return redirect()->route('useruploads')->with('success', 'Video updated successfully!');
    }
    catch (\Exception $e) {
        DB::rollBack();

        if (isset($thumbnailPath)) {
            Storage::disk('public')->delete($thumbnailPath);
        }

        return back()->with('error', 'Upload failed: Please Try Again');
    }
    }

    public function delete(VideoFeed $video): RedirectResponse
    {
        $video->delete();
        Storage::disk('public')->delete($video->thumbnail);
        Storage::disk('public')->delete($video->path);
        
        return back()->with('success', 'You deleted a video!');
    }
}
