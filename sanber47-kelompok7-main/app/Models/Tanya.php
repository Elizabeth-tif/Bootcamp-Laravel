<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanya extends Model
{
    use HasFactory;

    protected $table = 'tanya';

    protected $fillable = ['title', 'content', 'image', 'version_id', 'users_id'];

    public function version()
    {
        return $this->belongsTo(Version::class, 'version_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function jawabs()
    {
        return $this->hasMany(Jawab::class, 'tanya_id', 'id');
    }
}
