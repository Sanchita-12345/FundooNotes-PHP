<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','user_id'
    ];

    public $timestamps = false;
    
    public function notes(){
        //return $this->hasMany(Notes::class);
        return $this->belongsToMany('\App\Model\Notes','label_notes')->wherePivot('id');
    }
}
