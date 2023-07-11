<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auxiliary extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city',
        'state',
    ];

    public function members(){ // 1 auxiliary has many members
        return $this->hasMany(Member::class);
    }

}
