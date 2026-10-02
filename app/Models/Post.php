<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Izinkan kolom ini diisi lewat mass assignment (diperlukan untuk create & update)
    protected $fillable = ['title', 'description'];
}
