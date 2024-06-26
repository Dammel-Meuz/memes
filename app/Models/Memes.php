<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Memes extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'image',
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}


