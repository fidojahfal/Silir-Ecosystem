<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class histori_pengunjung_event extends Model
{
    use HasFactory;

    protected $table = 'histori_pengunjung_event';
    protected $fillable = ['tiket_pengunjung', 'id_event'];
    protected $primaryKey = 'id';
    
    public function event(){
        return $this->belongsTo('App\Models\event', 'id_event');
    }
}
