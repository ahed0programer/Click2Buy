<?php

namespace App\Models;

use App\Http\Resources\showproductResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Row extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
    ];

    protected $dates = ['deleted_at'];

    public function products()
    {

        return $this->belongsToMany(Product::class, 'productRow');
    }

    public function get_product($id)
    {
        $product_id = productRow::where('row_id' , $id)->pluck('product_id');
        $product = Product::whereIn('id' , $product_id)->where('status' , 1)->latest()->get();
        $product = showproductResource::collection($product);
        return $product;
    }
}
