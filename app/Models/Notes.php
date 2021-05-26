<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
        'updated_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier() {
        return $this->getKey();
    }

    public function getJWTCustomClaims() {
        return [];
    }

    // protected $table = "notes";

    // public function user(){
    //     return $this->belongsTo('App\Models\User');
    // }

    public function user(){
        return $this->belongsTo(User::class);
    }
    // public function labels()
    // {
    //     return $this->hasMany('App\Models\LabelsNotes', 'noteid');
    // }
}
