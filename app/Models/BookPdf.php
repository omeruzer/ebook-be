<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookPdf extends Model
{
    use HasFactory;

    protected $table = 'book_pdfs';
    protected $guarded = [];
}
