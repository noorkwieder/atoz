<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class escortlan extends Model
{
    use HasFactory;

    protected $table="Escortslan";
    protected $primaryKey="id";
    protected $fillable = [
        'name','escort_id'
    ];
    public $timestamps =false;


    public function escort()
    {
        return $this->belongsTo(escort::class, 'escort_id');
    }



}
