<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    use HasFactory;
    protected $table="companys";
    protected $primaryKey="id";
    protected $fillable = [
        'name',
    ];
    public $timestamps = true;

}
