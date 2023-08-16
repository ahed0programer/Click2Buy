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

    public function get_obtaining_product_details_with_disproportionate_quantity($inventory_id)
    {
        $inventories = inventory::where('id', $inventory_id)
            ->join('colours', 'inventories.colour_id', '=', 'colours.id')
            ->join('materials', 'inventories.material_id', '=', 'materials.id')
            ->join('sizes', 'inventories.size_id', '=', 'sizes.id')
            ->join('products', 'inventories.product_id', '=', 'products.id')
            ->select('products.titel as title', 'colours.name as colour', 'materials.name as material', 'sizes.size as size' , 'inventories.price as price' , 'inventories.image as photo' , 'inventories.quantity as ss')
            ->get();

        return $inventories;
    }
}
