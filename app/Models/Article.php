<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [ 'title', 'slug', 'body', 'img' ];

    public function state()
    {
        return $this->hasOne( \App\Models\State::class );
    }

    public function comments()
    {
        return $this->hasMany( \App\Models\Comment::class );
    }

    public function tags()
    {
        return $this->belongsToMany( \App\Models\Tag::class );
    }
}
