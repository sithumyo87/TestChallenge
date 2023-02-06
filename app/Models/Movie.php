<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Genre;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = [
        'title','summary','cover_image','genre_id','author','tags','ratings','file'    
    ];

    public function genre_category(){
        return $this->belongsTo(Genre::class,'genre_id');
    }
}
