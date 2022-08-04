<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roomtype extends Model
{
    use HasFactory;





    public $timestamps = false;
    protected $table="roomtype";
    protected $primaryKey="id";
    protected $fillable = [
        'type',
        'free',  'price',
        'number_of_person',
        'hotel_id',
        
    ];
    public function Hotels()
    {
        return $this->belongsTo(hotel::class, 'hotel_id');
    }









}
