<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    use HasFactory;
    protected $guarded = [];
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
