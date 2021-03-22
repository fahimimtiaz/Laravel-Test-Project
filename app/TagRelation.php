<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagRelation extends Model
{
    protected $table = 'tag_relation';
    //protected $guarded = [];
    protected $fillable = [
        ''
    ];


    public function tgInfo()
    {
        return $this->belongsTo('App\Tag', 'tag_id')->select('id', 'tag_name');
    }
}
