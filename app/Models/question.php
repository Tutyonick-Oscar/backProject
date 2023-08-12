<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class question extends Model
{
    use HasFactory,Searchable;
    protected $guarded = [];
    public function searchableAs () : string {
        return 'question';
    }
    public function toSearchableArray () : array {
        $array = $this->toArray();
        return $array;
    }
    public function answers () {
        return $this->hasMany(answer::class);
    }
    public function user () {
        return $this->belongsTo(User::class);
    }
    public function views () {
        return $this->hasMany(Views::class);
    }
}
