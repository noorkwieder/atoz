<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class savehotel extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table="SaveHotels";
    protected $primaryKey="id";
    protected $fillable = [
        'user_id',
        'hotel_id',
        
    ];
    public function hotels()
    {
        return $this->belongsTo(hotel::class, 'hotel_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }









}
