<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trip extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="Trips";
    protected $primaryKey="id";
    protected $fillable = [
        'from',
        'to',
        'date',
        'time',
        'period'
      ,
       'company_id' 
    
        ,'airport_id',  'user_id',
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }




            
    public function companys()
    {
        return $this->belongsTo(company::class, 'company_id');
    }

   

    public function airports()
    {
        return $this->belongsTo(airport::class, 'airport_id');
    }












}
