<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class covernorate extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="covernorates";
    protected $primaryKey="id";
    protected $fillable = [
      'name',
        'country_id',
        
    ];
    public function countres()
    {
        return $this->belongsTo(country::class, 'country_id');
    }
    public function taxis()
    {
        return $this->hasMany(taxi::class,'covernorate_id');
    }
        public function resturrants()
        {
            return $this->hasMany(Resturant::class,'covernorate_id2');
        }
        public function toursimplaces()
        {
            return $this->hasMany(toursimplace::class,'covernorate_id2');
        }

}
