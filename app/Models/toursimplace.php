<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class toursimplace extends Model
{
    use HasFactory;
    protected $table="toursimplaces2";
    protected $primaryKey="id";
    protected $fillable = [
        'name',
        'free_price',
        'open_time',
        'close_time',
        
        'location',
        
        'description',
        'img_url',
        'views',
        'category_id'
        ,'covernorate_id2'
    ];



    public function savetour()
    {
        return $this->hasMany(savetour::class,'toursimplaces2_id');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
        
    }
     public function covernorates()
    {
        return $this->belongsTo(covernorate::class, 'covernorate_id2');
    }

}
