<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event_area extends Model
{
    use HasFactory;

    protected $table = 'event_area';
    protected $fillable = ['id_event', 'id_area', 'keterangan'];
    protected $primaryKey = 'id';

    public function area(){
        return $this->belongsTo('App\Models\area', 'id_area');
    }
    
    public function event(){
        return $this->belongsTo('App\Models\event', 'id_event');
    }
}
