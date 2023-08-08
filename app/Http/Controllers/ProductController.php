<?php

namespace App\Http\Controllers;

use App\Http\Resources\showproductResource;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Colour;
use App\Models\Inventory;
use App\Models\Material;
use App\Models\Offer;
use App\Models\photoProduct;
use App\Models\Product;
use App\Models\productRow;
use App\Models\Row;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function pageAddProduct()
    {
        $sizes = Size::get();
        $brand = Brand::get();
        $colour = Colour::get();
        $material = Material::get();
        $categories = Category::get()->toTree();
        $rows = Row::get();
        return view('dashbord/product/addProduct', compact('sizes', 'brand', 'colour', 'material', 'categories', 'rows'));
    }


    public function creat_product(Request $request)
    {
        //$possibilities = $request->selection;
       

        $possibilities = json_decode($request->possibilities);

        if (empty(Brand::where('name', $request->brand)->first())) {
            Brand::create([
                'name' => $request->brand,
            ]);
        }
        if (empty(Offer::where('value', $request->offer)->first())) {
            Offer::create([
                'value' => $request->offer,
            ]);
        }

        
        $category_id = Category::where('id', $request->category_id)->first()->id;
        $brand_id = Brand::where('name', $request->brand)->first()->id;
        $offer_id = Offer::where('value', $request->offer)->first()->id;

        

        $product = Product::create([
            'titel' => $request->title,
            'descraption' => $request->description,
            'brand_id' => $brand_id,
            'offer_id' => $offer_id,
            'category_id' => $category_id,
            'status' => $request->status
        ]);



        // Create a new inventory record
        foreach ($possibilities as $possibility) {

            $color_model = Colour::where('name', $possibility->color)->first();
            if (empty($color_model)) {
                $color_model = Colour::create(['name' => $possibility->color]);
            }
            $material_model = Material::where('name', $possibility->material)->first();
            if (empty($material_model)) {
                $material_model = Material::create(['name' => $possibility->material]);
            }

            $size_model = Size::where('size', $possibility->size)->first();
            Inventory::create([
                'product_id' => $product->id,
                'colour_id' => $color_model->id,
                'material_id' => $material_model->id,
                'size_id' => $size_model->id,
                'price' => $possibility->price,
                'quantity' => $possibility->quantity
            ]);
        }

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('photos_product');//تم تعديل المسار من خلال مسح public
                photoProduct::create([
                    'photo' => $path,
                    'product_id' => $product->id,
                ]);
            }
        }

        if ($request->row_id && $request->row_id != 'none') {
            productRow::create([
                'product_id' => $product->id,
                'row_id' => $request->row_id,
            ]);
        }
        
        return response()->json(['message' => "it is been added successfully"]);
    }

    public function pageEditProduct($id)
    {
        $size = Size::get();
        $brand = Brand::get();
        $colour = Colour::get();
        $material = Material::get();
        $category = Category::get()->toTree();
        $product = Product::where('id', $id)->first();
        $offer = Offer::where('id', $product->offer_id)->first()->value;
        $brand_id = Product::where('id', $id)->first()->brand_id;
        $brand_product = Brand::where('id', $brand_id)->first()->name;
        //$productsInventory = Inventory::where('product_id', $id)->get();
        $productsInventory = Inventory::where('product_id', $id)
            ->join('colours', 'inventories.colour_id', '=', 'colours.id')
            ->join('materials', 'inventories.material_id', '=', 'materials.id')
            ->join('sizes', 'inventories.size_id', '=', 'sizes.id')
            ->select('inventories.id as id','colours.name as colour', 'materials.name as material', 'sizes.size as size','size_id','colour_id','material_id', 'quantity', 'price')
            ->get();

        $colourIds = $productsInventory->pluck('colour_id');
        $colours = Colour::whereIn('id', $colourIds)->get();
        $materialIds = $productsInventory->pluck('material_id');
        $materials = Material::whereIn('id', $materialIds)->get();
        $photos = photoProduct::where('product_id', $id)->pluck('photo');
        $rows = Row::get();
        $row_product = productRow::where('product_id', $id)->first();
        return view('dashbord/product/editProduct', compact('offer', 'productsInventory', 'size', 'brand', 'colour', 'material', 'category', 'product', 'brand_product', 'colours', 'materials', 'photos', 'rows', 'row_product'));
    }

    public function edit_product(Request $request, $id)
    {

       

        if (empty(Brand::where('name', $request->brand)->first())) {
            Brand::create([
                'name' => $request->brand,
            ]);
        }
        if (empty(Offer::where('value', $request->offer)->first())) {
            Offer::create([
                'value' => $request->offer,
            ]);
        }
        
        $category_id = Category::where('id', $request->category_id)->first()->id;
        $brand_id = Brand::where('name', $request->brand)->first()->id;
        $offer_id = Offer::where('value', $request->offer)->first()->id;

        Product::where('id', $id)->update([
            'titel' => $request->titel,
            'descraption' => $request->descraption,
            'brand_id' => $brand_id,
            'offer_id' => $offer_id,
            'category_id' => $category_id,
            'status' => $request->status
        ]);

        // this part is stopped currently
        // fadious 
        // هاض كود تبع ال الالوان والمادة والصور مو شغال حاليا
        // $colors = explode(',', $request->input('colors'));
        // $materials = explode(',', $request->input('materials'));
        // $sizes = $request->input('sizes');

        
        // $color_ids = [];
        // foreach ($colors as $color) {
        //     $colour = Colour::firstOrCreate(['name' => $color]);
        //     $color_ids[] = $colour->id;
        // }

        // $material_ids = [];
        // foreach ($materials as $material) {
        //     $material_model = Material::firstOrCreate(['name' => $material]);
        //     $material_ids[] = $material_model->id;
        // }

        // $size_ids = [];
        // foreach ($sizes as $size) {
        //     $size_model = Size::firstOrCreate(['size' => $size]);
        //     $size_ids[] = $size_model->id;
        // }

        // Create a new inventory record
        
        // foreach ($colors as $color) {
        //     $color_model = Colour::where('name', $color)->first();
        //     if (empty($color_model)) {
        //         $color_model = Colour::create(['name' => $color]);
        //     }

        //     foreach ($materials as $material) {
        //         $material_model = Material::where('name', $material)->first();
        //         if (empty($material_model)) {
        //             $material_model = Material::create(['name' => $material]);
        //         }

        //         foreach ($sizes as $size) {
        //             $size_model = Size::where('size', $size)->first();
        //             Inventory::where('product_id', $id)->update([
        //                 'product_id' => $id,
        //                 'colour_id' => $color_model->id,
        //                 'material_id' => $material_model->id,
        //                 'size_id' => $size_model->id,
        //                 'price' => 20,
        //                 'quantity' => 20
        //             ]);
        //         }
        //     }
        // }


        // if ($request->hasFile('photos')) {
        //     foreach ($request->file('photos') as $photo) {
        //         $path = $photo->store('public/photos_product');
        //         photoProduct::where('product_id', $id)->update([
        //             'photo' => $path,
        //             'product_id' => $id,
        //         ]);
        //     }
        // }

        if ($request->row_id) {
            if ($request->row_id != 'none') {
                $value = productRow::where('product_id', $id)->first();
                if ($value) {
                    productRow::where('product_id', $id)->update([
                        'row_id' => $request->row_id,
                    ]);
                } else {
                    productRow::create([
                        'product_id' => $id,
                        'row_id' => $request->row_id,
                    ]);
                }
            } else {
                productRow::where('product_id', $id)->delete();
            }
        }

        return response()->json([
            "message"=>"it's been updated successfully"
        ]);
    }


    public function show_product()
    {
        $product = Product::latest()->paginate(10);

        // foreach ($product as $products) {
        // $photo = photoProduct::where('product_id' , $products->id)->first();

        // }
        return view('dashbord/product/dashboard', compact('product'));
    }

    public function delete_inventory($id){
        $inventory = Inventory::find($id);
        
        if ($inventory) {
            $inventory->delete();
            // Record found and deleted successfully
        } else {
            // Record not found
            return response()->json([
                "message"=>"not found"
            ],404);
        }

        return response()->json([
            "message"=>"option deleted successfully"
        ]);
    }

    public function add_inventory(Request $request,$id){

        $color_model = Colour::where('name', $request->option["color"])->first();
        if (empty($color_model)) {
            $color_model = Colour::create(['name' => $request->option["color"]]);
        }
        $material_model = Material::where('name', $request->option["material"])->first();
        if (empty($material_model)) {
            $material_model = Material::create(['name' => $request->option["material"]]);
        }

        $size_model = Size::where('size', $request->option["size"])->first();

         $new_inventory=Inventory::create([
            'product_id' => $id,
            'colour_id' => $color_model->id,
            'material_id' => $material_model->id,
            'size_id' => $size_model->id,
            'price' => $request->option["price"],
            'quantity' => $request->option["quantity"]
        ]);

        return response()->json([
            "message"=>json_encode($request->option),
            "id"=>$new_inventory->id
        ]);
    }

    public function update_inventory(Request $request,$id){

        $option =Inventory::where('id',$id)->first();
        $option->update([
            'price'=>$request->price,
            'quantity'=>$request->quantity
        ]);

        return response()->json([
            "message"=>"inventory has been updated successfuly"
        ]);
    }


    public function softDelete($id)
    {
        Product::where('id', $id)->delete();
        //Inventory
        productRow::where('product_id', $id)->delete();
        return redirect()->back();
    }
}
