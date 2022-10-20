<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function images()
    {
        return $this->hasMany(Image::class, 'galeri_id');
    }
}
