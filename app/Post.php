<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Post
 *
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post query()
 * @mixin \Eloquent
 */
class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'user_id',
        'file_1',
        'file_2',
        'file_3',
        'views'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}