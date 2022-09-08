<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;

class Berita extends Model
{
    protected $table = "berita";

    public function kategori()
    {
    	return $this->belongsTo('App\Models\Kategori', 'id_kategori', 'id');
    }
}
