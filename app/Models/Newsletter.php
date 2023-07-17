<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Newsletter extends Model
{
    use HasFactory;

    protected $fillable = [
            'title',
            'slug',
            'location',
            'pdfImage',
            'active',
            'year',
            'published_at',
            'user_id',
        ];

        public function getFormattedDate() {
            return $this->published_at->format('F jS Y');
        }

        public function getLocation(){
            if(str_starts_with($this->location, 'http')){
                return $this->location;
            }
            return '/storage/'.$this->location;
        }

}
