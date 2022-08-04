<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hbooking extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table="HBooking";
    protected $primaryKey="id";
    protected $fillable = [
    
        'enter_date',
        'days',
        'done',
        'roomtype_id',
    
                'user_id'
    ];
    

    
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function hotels()
    {
        return $this->belongsTo(roomtype::class, 'roomtype_id');
    }
    
    
}
