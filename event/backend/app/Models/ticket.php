<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{
    use HasFactory;
    protected $table = 'tickets';
    protected $fillable = ['email','nama','id_event','jumlah_tiket','bukti_pembayaran','status'];
    protected $primaryKey = 'id';
    
    public function event(){
        return $this->belongsTo('App\Models\event', 'id_event');
    }
}
