<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rbooking extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="rBooking";
    protected $primaryKey="id";
    protected $fillable = [
    
        'date',
        'time',
        'done',
        'table_id',
    
                'user_id'
    ];
    

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function tablets()
    {
        return $this->belongsTo(Tablet::class, 'table_id');
    }






    
}
