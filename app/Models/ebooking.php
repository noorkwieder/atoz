<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ebooking extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="ebooking";
    protected $primaryKey="id";
    protected $fillable = [
    
        'date',
        'number_day',
        'done',
        'escort_id',
    
                'user_id'
    ];
    

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function escorts()
    {
        return $this->belongsTo(escort::class, 'escort_id');
    }


}
