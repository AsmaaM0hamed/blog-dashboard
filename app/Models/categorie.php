<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    use HasFactory;
    protected $fillable=['title','img'];

    public function posts()
    {
        return $this->hasMany(user::class);
    }

}
