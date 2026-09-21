<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // Kasih izin biar kolom title sama description bisa diisi barengan lewat form
    protected $fillable = ['title', 'description'];
}
