<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'description',
        'prix',
        'image',
        'cat_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }
}
