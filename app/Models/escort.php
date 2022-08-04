<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class escort extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="Escorts";
    protected $primaryKey="id";
    protected $fillable = [
        'free',
        'f_name',
        'l_name',
            'phone',
        'img_url',
        'user_id',
            'price_per_day',
            'covernorate_id2'
    ];
   
    public function escort()
    {
        return $this->hasMany(escortlan::class,'escort_id');
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
