<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    //Here i will use sluggable and fillable
    use Sluggable;
    protected $fillable = ['title',
     'describtion', 
     'user_id', 
     'slug',
      'image'];

    public function user()
    {
        //returning object model method
        return $this->belongsTo('App\User');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public static function storePostImage($request)
    {
        if ($request->file('image')) {
            $path = $request->file('image')->store('public/images');
            $path = str_replace('public/', '', $path);
        }
        else
        {
            $path = null;
        return $path;
        }
    }
    
}
