<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Posts extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [

        'tittle',
        'news_content',
        'author',
        
    ];

    public function user() : HasOne
    {
        return $this->hasOne(User::class);    
    }

    public function comments() : HasMany
    {
        return $this->hasMany(comments::class);    
    }
}
