<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;

    protected $table = 'events';
    protected $fillable = ['nama_event', 'penyelenggara', 'deskripsi_event', 'biaya masuk', 'waktu_start', 'waktu_end', 'status_event', 'banner_event', 'email'];
    protected $primaryKey = 'id_event';

    public function event_area(){
        return $this->hasMany('App\Models\event_area', 'id_event');
    }

    public function stands(){
        return $this->hasMany('App\Models\histori_pengunjung_event', 'id_event');
    }
}
