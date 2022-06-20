<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',
        'contenu',
    ];
    /**
     * Pour creer la relation entre Article et Categories
     */
    function category(){
        return $this->belongsTo(Categories::class);
    }
}
