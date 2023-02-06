<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Movie;

class Genre extends Model
{
    use HasFactory;
    protected $fillable=[
        'name'
    ];

    public function movies(){
        return $this->hasMany(Movie::class);
    }
    
}
