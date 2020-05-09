<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Post extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;


    protected $fillable = ['user_id', 'photo_id', 'category_id', 'title', 'content'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source'        => 'title',
                'onUpdate'      => true,
            ]
        ];
    }

    // Start Relationship
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function photoPlaceholder()
    {
        return "http://placehold.it/900x300";
    }
}
