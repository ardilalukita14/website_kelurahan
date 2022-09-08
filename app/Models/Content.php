<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Layanan;

class Content extends Model
{
    protected $table = "content";

    public function layanan()
    {
    	return $this->belongsTo('App\Models\Layanan', 'id_layanan', 'id');
    }
}
