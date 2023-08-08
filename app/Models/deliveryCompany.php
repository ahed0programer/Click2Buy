<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class deliveryCompany extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
    ];

    protected $dates = ['deleted_at'];

    

    public function address(){
        
        return $this->belongsToMany(address::class , 'delivery_company_addresses');
    }

    public function orders(){
        
        return $this->hasMany(Order::class);
    }
}
