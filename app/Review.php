<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book;
use App\User;

class Review extends Model
{
    // protected $fillable = ['name', 'email', 'review'];
    // protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $guarded = []; // allow mass-filling of everything

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
