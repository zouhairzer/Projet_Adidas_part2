<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    public function role()
    {
        return $this->belongsTo(role::class);
    }

    public function route()
    {
        return $this->belongsTo(Route::class);
    }


}
