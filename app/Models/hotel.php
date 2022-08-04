<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hotel extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table="Hotels";
    protected $primaryKey="id";
    protected $fillable = [
        'name',
        'user_id',
        'phone',
        'location',
       'stars' ,
        'views',
        'img_url','covernorate_id2'
    ];

            
  

    public function roomtypes()
    {
        return $this->hasMany(roomtype::class,'hotel_id');
    }
    public function savehotels()
    {
        return $this->hasMany(savehotel::class,'hotel_id');
    }


    public function covernorates()
    {
        return $this->belongsTo(covernorate::class, 'covernorate_id2');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }










}
