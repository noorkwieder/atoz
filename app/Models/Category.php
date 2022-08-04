<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table="categories";
    protected $primaryKey="id";
    protected $fillable = [
        'name',
    ];
    public $timestamps = true;

   
    public function toursimplaces()
    {
        return $this->hasMany(toursimplace::class,'category_id');
    }
}
