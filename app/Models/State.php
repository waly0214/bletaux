<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $fillable =[
        'state_id',
        'country_id',
        'name',
        'abv',
    ];

    function country() {
        return $this->belongsTo(Country::class);
    }

    function members() {
        return $this->hasMany(Member::class);
    }

    function cities() {
            return $this->hasMany(City::class);
        }
}
