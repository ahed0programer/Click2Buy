<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class deliveryCompanyAddress extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'delivery_companies_id',
        'address_id',
    ];

    protected $dates = ['deleted_at'];

    public function address()
    {
        return $this->belongsTo(address::class);
    }

    public function deliveryCompany()
    {
        return $this->belongsTo(deliveryCompany::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getaddress($address_id)
    {
        $address = address::where('id' , $address_id)->pluck('name');
        return $address;
    }
}
