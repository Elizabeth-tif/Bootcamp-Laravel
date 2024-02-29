<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    use HasFactory;
    protected $table = 'version';

    public function tanyas()
    {
        return $this->hasMany(Tanya::class, 'version_id', 'id');
    }
}
