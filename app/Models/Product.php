<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'titel',
        'descraption',
        'brand_id',
        'offer_id',
        'category_id',
        'price',
        'evaluation',
        'status',
    ];

    protected $dates = ['deleted_at'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }


    public function wishlist()
    {
        return $this->belongsToMany(wishList::class, 'wish_lists');
    }


    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }


    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }


    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'inventories')->withPivot('colour_id', 'material_id', 'quantity');
    }

    public function colours()
    {
        return $this->belongsToMany(Colour::class, 'inventories')->withPivot('size_id', 'material_id', 'quantity');
    }




    public function Materials()
    {
        return $this->belongsToMany(Material::class, 'inventories')->withPivot('colour_id', 'size_id', 'quantity');
    }

    public function rows()
    {
        return $this->belongsToMany(Row::class, 'product_rows');
    }

    public function offer()
    {
        return $this->belongsTo(Offer::class, 'offer_id');
    }

    public function photo_products()
    {
        return $this->hasMany(photoProduct::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function getBrand($brand_id)
    {
        $brand = Brand::where('id', $brand_id)->first(['id', 'name']);
        return $brand;
    }

    public function getOffer($offer_id)
    {
        $offer = Offer::where('id', $offer_id)->first(['value']);
        return $offer;
    }

    public function getCategory($category_id)
    {
        $category = Category::where('id', $category_id)->first(['id', 'name']);
        return $category;
    }


    public function getattribut($id)
    {
        $inventories = Inventory::where('product_id', $id)
            ->join('colours', 'inventories.colour_id', '=', 'colours.id')
            ->join('materials', 'inventories.material_id', '=', 'materials.id')
            ->join('sizes', 'inventories.size_id', '=', 'sizes.id')
            ->select('inventories.id as inventory_id', 'colours.name as colour', 'materials.name as material', 'sizes.size as size', 'price', 'quantity', 'image')
            ->get();
        return $inventories;
    }

    public function getPhoto($id)
    {
        $photos = photoProduct::where('product_id', $id)->pluck('photo');
        return $photos;
    }

    public function getComment($product_id)
    {
        $comments = Comment::where('comments.product_id', $product_id)
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->leftJoin('evaluations', function ($join) {
                $join->on('evaluations.user_id', '=', 'comments.user_id')
                    ->on('evaluations.product_id', '=', 'comments.product_id');
            })
            ->select('comments.id as comment_id', 'users.name as user_name', 'comments.text', 'evaluations.id as rating_id', 'evaluations.evaluation as rating')
            ->union(
                Evaluation::where('evaluations.product_id', $product_id)
                    ->join('users', 'evaluations.user_id', '=', 'users.id')
                    ->leftJoin('comments', function ($join) {
                        $join->on('comments.user_id', '=', 'evaluations.user_id')
                            ->on('comments.product_id', '=', 'evaluations.product_id');
                    })
                    ->whereNull('comments.id')
                    ->select('evaluations.id as comment_id', 'users.name as user_name', DB::raw('"" as text'), 'evaluations.id as rating_id', 'evaluations.evaluation as rating')
            )
            ->get();

        return $comments;
    }

    public function getEvaluation($product_id)
    {
        $product_evaluations = Product::where('products.id', $product_id)
            ->join('evaluations', 'products.id', '=', 'evaluations.product_id')
            ->select('products.evaluation', DB::raw('count(evaluations.id) as count_people_evaluation'))
            ->groupBy('products.evaluation')
            ->get();

        return $product_evaluations;
    }
}
