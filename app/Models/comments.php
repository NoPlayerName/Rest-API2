<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class comments extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'post_id',
        'user_id',
        'comments_content'
    ];

    public function user() : HasOne
    {
        return $this->hasOne(User::class);    
    }

    public function post() : HasOne 
    {
        return $this->hasOne(posts::class);    
    }
}
