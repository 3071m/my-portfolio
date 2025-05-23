<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'link',
        'date',
        'technologies',
    ];

    // บอกให้ Laravel แปลง field 'date' เป็น date object (Carbon)
    protected $casts = [
        'date' => 'date',
    ];
}

