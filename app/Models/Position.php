<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    function members() {
        return $this->hasMany(Member::class);
    }

    function positions() {
        return $this->hasMany(Position::class);
    }
}
