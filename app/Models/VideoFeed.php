<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoFeed extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'path',
        'uploaded_by',
        'needs_moderation',
        'title',
        'description',
        'thumbnail'
    ];


     /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'uploaded_date' => 'datetime'
        ];
    }
}
