<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Review;

class Book extends Model
{
    //protected $table = 'books';

    public function publisher(){
        return $this->belongsTo(Publisher::class, 'publisher_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
