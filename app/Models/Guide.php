<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    use HasFactory;

    protected $table = 'panduan';

    protected $fillable = [
        'title',
        'pdf_file',
    ];
}
