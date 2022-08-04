<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class saveresturant extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table="SaveResturants";
    protected $primaryKey="id";
    protected $fillable = [
        'user_id',
        'resturant_id',
        
    ];
    public function hotels()
    {
        return $this->belongsTo(Resturant::class, 'resturant_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }















}
