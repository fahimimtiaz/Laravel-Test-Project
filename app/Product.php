<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name', 'product_details', 'logo', 'user_id', 'category_id'
    ];

    public function userInfo()
    {
        return $this->belongsTo('App\User', 'user_id')->select('id', 'name', 'email');
    }

    public function catInfo()
    {
        return $this->belongsTo('App\Catagory', 'category_id')->select('id', 'name');
    }

    public function tagInfo()
    {
        return $this->hasMany(TagRelation::class);
    }
}
