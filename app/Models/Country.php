<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_id','name', 'code',
    ];

    public function members(){ // 1 country has many members
        return $this->hasMany(Member::class);
    }

    public function states(){ // 1 country has many states
        return $this->hasMany(State::class);
    }
}
