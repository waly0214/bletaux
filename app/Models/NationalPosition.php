<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NationalPosition extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    function members() {
        return $this->hasMany(Member::class);
    }
}
