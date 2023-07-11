<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_id', 'state_id','name',
    ];

    public function state(){ // state belongs to city
        return $this->belongsTo(State::class);
    }

    public function members(){ // cities have many members
        return $this->hasMany(Member::class);
    }
}
