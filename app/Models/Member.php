<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'active',
        'green',
        'position_id',
        'national_position_id',
        'position_type',
        'first_name',
        'last_name',
        'address',
        'state',
        'city',
        'zip_code',
        'email',
        'home_phone',
        'cell_phone',
        'date_of_birth',
        'date_joined',
        'auxiliary_id',
    ];

    protected $casts = ['active' => 'boolean'];

    public function state(){ // 1 member has 1 state
        return $this->belongsTo(State::class);
    }

    public function country() { // 1 member belongs to 1 country
        return $this->belongsTo(Country::class);
    }

    public function city() { // 1 member belongs to 1 city
            return $this->belongsTo(City::class);
        }

    public function auxiliary() { // 1 member belongs to 1 auxiliary
            return $this->belongsTo(Auxiliary::class);
        }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function nationalPosition(){
        return $this->belongsTo(NationalPosition::class);
    }
}
