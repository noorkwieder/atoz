<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
class Resturant extends Model
{
    use HasFactory;




    protected $table="Resturants";
    protected $primaryKey="id";
    protected $fillable = [
        'name',
        'open_time',
        'close_time',
        'phone',
        'location',
       'stars' ,
        'views',
        'user_id',
        'img_url','covernorate_id2'
    ];

            
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }





    public function Tablets()
    {
        return $this->hasMany(Tablet::class,'resturant_id');
    }
    public function saveresturant()
    {
        return $this->hasMany(saveresturant::class,'resturant_id');
    }


    public function covernorates()
    {
        return $this->belongsTo(covernorate::class, 'covernorate_id2');
    }















}
