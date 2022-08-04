<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coupon extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "Coupons"; 
    protected $fillable=["id","name","price","type","percentage","done","exp_date","user_id"];

    public function users ()
    {
        return $this->belongs(User::class,'user_id');
    }
}


