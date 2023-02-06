<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function link()
    {
        return $this->hasMany(Keuangan_link::class, 'keuangan_id');
    }

    public function files()
    {
        return $this->hasMany(Keuangan_file::class, 'keuangan_id');
    }
}
