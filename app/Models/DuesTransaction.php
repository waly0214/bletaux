<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DuesTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'name',
        'year',
        'date',
        'membershipType',
        'amount',
        'memo',
    ];
    public function members() {
        return $this->hasMany(Member::class);
    }


}
