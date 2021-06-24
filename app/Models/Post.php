<?php

namespace App\Models;

use App\Casts\UserCode;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $guarded = [];

    protected $casts = [
//        'user_id' => UserCode::class
        'last_posted_at' => 'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function path()
    {
        return url("posts/{$this->id}-" . Str::slug($this->title));
    }

}
