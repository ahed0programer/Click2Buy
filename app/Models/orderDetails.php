<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class orderDetails extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'order_id',
        'product_id',
        'inventory_id',
        'quantity',
    ];

    protected $dates = ['deleted_at'];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function inventory()
    {
        return $this->belongsTo(inventory::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    
    
}
