<?php

namespace App\Models;

use App\Models\Like;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravelista\Comments\Commentable;

class Post extends Model
{
    use HasFactory, Commentable;
    //Table name
    protected $table = 'posts';
    //primary key
    public $primaryKey = 'id';
    //Timestamp
    public $timestamp = true;

    public function likedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
