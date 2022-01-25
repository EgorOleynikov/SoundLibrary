<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sounds extends Model
{
    use HasFactory;

    protected $table = 'sounds';

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'tags', 'sound_path', 'cover_path', 'user_id', 'published', 'category'];
}
