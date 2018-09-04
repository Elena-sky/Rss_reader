<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rss extends Model
{
    protected $fillable = [
        'name', 'rss_path', 'user_id',
    ];
    protected $table = 'rsss';

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
