<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class triptype extends Model
{
    use HasFactory;



    protected $table="TripsType";
    protected $primaryKey="id";
    protected $fillable = [
        'type',
        'price',
        'free',

      
       'trip_id' 
    
        
    ];
    public $timestamps = false;
    
    public function trips()
    {
        return $this->belongsTo(trip::class, 'trip_id');
    }














}
