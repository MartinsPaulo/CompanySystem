<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';
    protected $fillable = ['name','tel_number','whats_number','email','adress','city_id'];

    public function city() {
          return $this->belongsTo(City::class,'city_id');
    }

}
