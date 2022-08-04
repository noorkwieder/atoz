<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbooking extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="tbooking";
    protected $primaryKey="id";
    protected $fillable = [
    

    
        'done',
        'triptype_id',
    
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
