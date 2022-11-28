<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Brosur extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function kategori()
    {
        return $this->belongsTo(Brosur_kategori::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function files()
    {
        return $this->hasMany(File_brosur::class, 'brosur_id');
    }
}
