<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisiMisi extends Model
{
    use HasFactory;
    protected $table = 'visimisi';
    public $timestamps = false;

    protected $fillable = [
        'judul',
        'visi',
        'misi',
    ];
}
