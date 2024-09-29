<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'user_id'];

    protected static function booted(){
        static::creating(function (Post $post){
            if (auth()->check() && is_null($post->user_id)) {
                $post->user_id = Auth::id();
            }
        });
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
