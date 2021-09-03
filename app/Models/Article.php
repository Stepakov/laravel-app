<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [ 'title', 'slug', 'body', 'img' ];
    public $dates = [ 'published_at' ];

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

    public function getBodyPreview()
    {
        return Str::substr( $this->body, 0, 100 );
    }

    public function createdAtForHuman()
    {
        return $this->created_at->diffForHumans();
    }

    public function scopeLastLimit( $query, $numbers )
    {
        return $query->with( 'tags', 'state' )->orderBy( 'created_at', 'DESC' )->take( $numbers )->get();
    }

    public function scopeAllPaginate( $query, $numbers )
    {
        return $query->with( 'tags', 'state' )->orderBy( 'created_at', 'DESC' )->paginate( $numbers );
    }

    public function scopeFindBySlug( $query, $slug )
    {
        return $query->with( 'tags', 'state', 'comments' )->where( 'slug', $slug )->firstOrFail();
    }

    public function scopeFindByTag( $query )
    {
        return $query->with( 'tags', 'state' )->orderBy( 'created_at', 'DESC' )->paginate( 7 );
    }
}
