<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maklumat extends Model
{
    protected $table = 'maklumat';
    public $timestamps = false;

    protected $fillable = [
        'judul',
        'isi',
        'foto'
    ];
}
