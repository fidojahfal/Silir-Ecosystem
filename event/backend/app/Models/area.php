<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class area extends Model
{
    use HasFactory;

    protected $table = 'areas';
    protected $fillable = ['nama_area', 'luas_area', 'slot_stand', 'harga_sewa', 'harga_buka_stand','status_area'];
    protected $primaryKey = 'id_area';

    public function stand(){
        return $this->hasMany('App\Models\stand', 'id_area');
    }
    
    public function event_area(){
        return $this->hasMany('App\Models\event_area', 'id_area');
    }
}
