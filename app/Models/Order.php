<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id',
        'total_price',
        'delivery_company_address_id',
        'status'
    ];

    protected $dates = ['deleted_at'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function delivery_company_adress()
    {
        return $this->belongsTo(deliveryCompanyAddress::class, 'delivery_company_address_id');
    }


    public function delivery_company()
    {
        return $this->belongsTo(deliveryCompany::class);
    }


    public function order_details()
    {
        return $this->hasMany(orderDetails::class);
    }


    public function products()
    {

        return $this->belongsToMany(Product::class);
    }

    public function get_user_name($user_id)
    {
        $user_name = User::where('id', $user_id)->first()->name;
        return $user_name;
    }

    public function get_delivary_company($delivery_company_address_id)
    {
        $delivery_company_address = deliveryCompanyAddress::where('id', $delivery_company_address_id)->first();
        $delivery_company = deliveryCompany::where('id', $delivery_company_address->delivery_companies_id)->first()->name;
        $address = address::where('id', $delivery_company_address->address_id)->first()->name;

        return [
            'id' => $delivery_company_address->id,
            'name' => $delivery_company,
            'address' => $address
        ];
    }


    public function get_details_product($order_id)
    {
        $order_details = orderDetails::where('order_id', $order_id)
            ->join('inventories', 'order_details.inventory_id', '=', 'inventories.id')
            ->join('colours', 'inventories.colour_id', '=', 'colours.id')
            ->join('materials', 'inventories.material_id', '=', 'materials.id')
            ->join('sizes', 'inventories.size_id', '=', 'sizes.id')
            ->join('products', 'inventories.product_id', '=', 'products.id')
            ->select('inventories.id as inventory_id', 'products.titel as title', 'colours.name as colour', 'materials.name as material', 'sizes.size as size', 'order_details.quantity' , 'inventories.price as price' , 'inventories.image as photo')
            ->get();

        return $order_details;
    }
}
