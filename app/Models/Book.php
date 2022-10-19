<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;


    protected $table = 'books';
    protected $guarded = [];

    public function author(){
        return $this->hasOne(Author::class,'id','author_id');
    }
    public function publisher(){
        return $this->hasOne(Publisher::class,'id','publisher_id');
    }
    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }
    public function files(){
        return $this->hasMany(BookPdf::class,'book_id');
    }
}
