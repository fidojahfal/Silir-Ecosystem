<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stand extends Model
{
    use HasFactory;

    protected $table = 'stands';
    protected $fillable = ['nama_stand', 'deskripsi_stand', 'id_area', 'foto_stand', 'status_stand','email'];
    protected $primaryKey = 'id_stand';
    
    public function area(){
        return $this->belongsTo('App\Models\area', 'id_area');
    }
}
