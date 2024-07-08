<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Bengkel extends Model
{
    use HasFactory;
    protected $table = "bengkels";
    protected $fillable = ['id', 'foto', 'kategori', 'nama_bengkel', 
                            'deskripsi' , 'lokasi',	'jam_buka',	'jam_tutup',
                            'created_at', 'updated_at'];
}


