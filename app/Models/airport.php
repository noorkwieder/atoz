<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class airport extends Model
{
    use HasFactory;protected $table="airports";
    protected $primaryKey="id";
    protected $fillable = [
        'name',
    ];
    public $timestamps = true;

}
