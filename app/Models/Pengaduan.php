<?php

namespace App\Models;

use App\Models\User;
use App\Models\Solusi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\Uuid;

class Pengaduan extends Model
{
    use HasFactory, Uuid;

    protected $fillable = [
        'tentang',
        'aduan',
        'image',
        'status',
        'user_id',
        'solusi_id',
        'penerima_id',
        'tipe'
    ];

    protected $appends = ['imagedir'];

    public function User(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function Penerima(){
        return $this->hasOne(User::class, 'id', 'penerima_id');
    }

    public function Solusi(){
        return $this->hasOne(Solusi::class, 'pengaduan_id', 'id');
    }

    
    public function getImagedirAttribute()
    {
        return asset('storage/ImagePengaduan/' . $this->image);
    }
   
}
