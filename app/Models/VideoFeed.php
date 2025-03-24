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

    public function user()
{
    // Every video belongs to a user, using uploaded_by as the foreign key
    return $this->belongsTo(User::class, 'uploaded_by'); 
}

public function scopeOwnedBy($query, $userId)
{
    return $query->where('uploaded_by', $userId);
}
}
