<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class post extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cat()
    {
        return $this->belongsTo(categorie::class ,'categories_id');
    }

    public function tags()
    {
        return $this->belongsToMany(tag::class ,'post_tag','post_id','tag_id');
    }
}
