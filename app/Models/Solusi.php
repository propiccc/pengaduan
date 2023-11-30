<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Solusi extends Model
{
    use HasFactory, Uuid;
    protected $fillable = [
        'solusi',
        'user_id',
        'pengaduan_id',
        'image'
    ];

    protected $appends = ['imagedir'];

    public function getImagedirAttribute()
    {
        return asset('storage/ImageSolusi/' . $this->image);
    }
   
}

