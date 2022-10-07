<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'Address';
    protected $fillable = ['street','number','complement','city_id','state_id'];

    public function city() { 
          return $this->belongsTo(City::class,'city_id');
    }

    public function state() { 
        return $this->belongsTo(State::class,'state_id');
  }

}
