<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [
        'product_id',
        'colour_id',
        'size_id',
        'material_id',
        'image',
        'quantity',
        'price',
    ];

    protected $dates = ['deleted_at'];
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function colour()
    {
        return $this->belongsTo(Colour::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}
