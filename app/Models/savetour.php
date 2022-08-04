<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class savetour extends Model
{
    use HasFactory;



    public $timestamps = false;


    protected $table="SaveTours";
    protected $primaryKey="id";
    protected $fillable = [
        'user_id',
        'toursimplaces2_id',
        
    ];
    public function toursimplaces()
    {
        return $this->belongsTo(toursimplace::class, 'toursimplaces2_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }







}
