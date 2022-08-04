<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    use HasFactory;
    protected $table="countres";
    protected $primaryKey="id";
    protected $fillable = [
        'name',
    ];
    public $timestamps = true;

    public function covernorates()
    {
        return $this->hasMany(covernorate::class,'country_id');
    }
}
