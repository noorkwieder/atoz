<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class taxi extends Model
{
    use HasFactory;




    protected $table="taxis";
    protected $primaryKey="id";
    protected $fillable = [
        'name',
        
        'price_per_1km',
        'phone_url',
        'covernorate_id',
        
    ];
    public function covernorates()
    {
        return $this->belongsTo(covernorate::class, 'covernorate_id');
    }



}
