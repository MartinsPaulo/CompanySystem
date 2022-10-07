<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $table = 'states';
    protected $fillable = ['name','abbreviation'];

    public function state() {
        return $this->hasMany(City::class,'state_id');
    }
}
