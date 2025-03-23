<?php

namespace App\Http\Controllers;

use App\Models\VideoFeed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller{
    public function uploadVideo(Request $request) {
        $uploadVideoFields = $request->validate([
            'title'       => ['required', 'string', 'min:1'],
            'description' => ['required', 'string']
        ]);
        DB::beginTransaction();
        try {
            $thumbnailName = str_replace(' ', '-', $request->file('thumbnail')->getClientOriginalName());
            $videoName     =  str_replace(' ', '-', $request->file('video')->getClientOriginalName());
    
            $thumbnailPath = $request->file('thumbnail')->storeAs('thumbnails', $thumbnailName, 'public');
            $videoPath     = $request->file('video')->storeAs('videos', $videoName, 'public');
            VideoFeed::create([
                'title'            => $uploadVideoFields['title'],
                'description'      => $uploadVideoFields['description'],
                'thumbnail'        => $thumbnailPath,
                'path'             => $videoPath,
                'uploaded_by'      => Auth::id(),
                'uploaded_date'    => now(),
                'needs_moderation' => false
            ]);
            DB::commit();
            return redirect()->route('mainpage')->with('success', 'Video uploaded successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            // Roll back uploaded files if they exist however this will delete a video if the user uploads a duplicate
            //TODO: Come Back and don't allow duplicates or change video_feed structure
            if (isset($thumbnailPath)) {
                Storage::disk('public')->delete($thumbnailPath);
            }
            if (isset($videoPath)) {
                Storage::disk('public')->delete($videoPath);
            }
    
            return back()->withErrors(['error' => 'Upload failed: ' . $e->getMessage()]);
        }
    }
}