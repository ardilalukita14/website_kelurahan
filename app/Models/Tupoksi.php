<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tupoksi extends Model
{
    protected $table = 'tupoksi';
    public $timestamps = false;

    protected $fillable = [
        'judul',
        'isi',
        'foto'
    ];
}
