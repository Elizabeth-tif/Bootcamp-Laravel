<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawab extends Model
{
    use HasFactory;

    protected $table = 'jawab';

    protected $fillable = ['image', 'content', 'tanya_id', 'user_id'];

    public function tanya()
    {
        return $this->belongsTo(Tanya::class, 'tanya_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
