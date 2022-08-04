<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tablet extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="Tablets";
    protected $primaryKey="id";
    protected $fillable = [
        'type',
        'free',
        'number_of_person',
        'resturant_id',
        
    ];
    public function Resturants()
    {
        return $this->belongsTo(Resturant::class, 'resturant_id');
    }


}
