<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maps extends Model
{
    protected $table = 'maps';
    protected $primaryKey = 'id_bengkel';
    protected $fillable = ['id_bengkel', 'koordinatX', 'koordinatY'];

    public function bengkel()
    {
        return $this->belongsTo(Bengkel::class, 'id');
    }
}
