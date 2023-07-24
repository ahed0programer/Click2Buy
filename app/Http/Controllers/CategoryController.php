<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Kalnoy\Nestedset\NodeTrait;

class CategoryController extends Controller
{

    public function showcategory(){
        $categories = Category::get()->toTree();

        return view('dashbord/category/category' , compact('categories'));
    }


    public function pageaddcategory()
    {
        $categories = Category::get()->toTree();

        return view('dashbord/category/addcategory', compact('categories'));
    }


    public function create_category(Request $request)
    {
        if(!$request->photo == 'null'){
            return response('pleas enter photo');
        }
        $validate = $request->validate([
            'category' => 'required',
            'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);

        $image_path = $request->file('photo')->store('public/category_photo');
        
        // Create a new root node
        if ($request->parent_id == 'none') {
            if (empty(Category::where('name', $request->category)->first('name'))) {
                $category = Category::create([
                    'name' => $request->category,
                    'photo' => $image_path
                ]);
                // $category = Category::get()->toTree();

                return redirect()->route('pageeditcategory', $category->id);
            } else {
                return response('parent already exists');
            }
        }

        // Add a new branch to the root node
        if ($request->parent_id && $request->parent_id !== 'none') {
            if (!empty(Category::where('name', $request->category)->first())) {
                $parent_ids = Category::where('name', $request->category)->pluck('parent_id');
                if ($parent_ids->contains($request->parent_id)) {
                    // $category = Category::get()->toTree();
                    // return redirect()->route('pageeditcategory', $category->id);
                    return response('category already exists');

                } else if (!empty(Category::where('id', $request->parent_id)->first('name'))) {

                    $root = Category::where('id', $request->parent_id)->first();

                    $category = new Category([
                        'name' => $request->category,
                        'photo' => $image_path
                    ]);

                    $root->appendNode($category);
                    // $category = Category::get()->toTree();
                    return redirect()->route('pageeditcategory', $category->id);

                } else {
                    return response('this parent not found');
                }
            } else if (!empty(Category::where('id', $request->parent_id)->first('name'))) {

                $root = Category::where('id', $request->parent_id)->first();

                $category = new Category([
                    'name' => $request->category,
                    'photo' => $image_path
                ]);

                $root->appendNode($category);
                // $category = Category::get()->toTree();
                return redirect()->route('pageeditcategory', $category->id);

            } else {
                return response('this parent not found');
            }
        }
    }



    public function pageeditcategory($id)
    {
        $category = Category::where('id' , $id)->first();
        $photo = $category->photo;
        $categories = Category::get()->toTree();
        // $parent = Category::where('parent_id' , $category->parent_id)->first()->name;
        return view('dashbord/category/editcategory', compact('category','categories','photo'));
    }


    public function edit_category(Request $request, $id)
    {
        if(!$request->photo == 'null'){
            return response('pleas enter photo');
        }
        $request->validate([
            'category' => 'required',
            'parent_id' => 'required',
            'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);
    
        $old_image_path = Category::where('id', $id)->first()->photo;
        Storage::delete($old_image_path);
        $image_path = $request->file('photo')->store('public/category_photo');
    
        if ($request->parent_id == 'none') {
            if (!empty(Category::where('id', $id)->where('parent_id', null)->first())) {
                Category::where('id', $id)->update([
                    'name' => $request->category,
                    'photo' => $image_path
                ]);
                Category::fixTree();
    
                return redirect()->back();
            } else if (!empty(Category::where('id', $id)->where('parent_id', '!=', null)->first()) && empty(Category::where('parent_id', $id)->first())) {
                Category::where('id', $id)->update([
                    'name' => $request->category,
                    'parent_id' => null,
                    'photo' => $image_path
                ]);
    
                Category::fixTree();
    
                return redirect()->back();

            } else {
                return response('Node cannot be changed to father');
            }
        } else {
            if (!empty(Category::where('id', $id)->where('parent_id', null)->first())) {
                if (!empty(Category::where('id', $id)->where('parent_id', null)->first()) && empty(Category::where('parent_id', $id)->first())) {
                    Category::where('id', $id)->update([
                        'name' => $request->category,
                        'parent_id' => $request->parent_id,
                        'photo' => $image_path
                    ]);
    
                    Category::fixTree();
    
                    return redirect()->back();

                } else {
                    return response('Node cannot be changed to sub category');
                }
            } else if (!empty(Category::where('id', $id)->where('parent_id', '!=', null)->first()) && empty(Category::where('parent_id', $id)->first())) {
                Category::where('id', $id)->update([
                    'name' => $request->category,
                    'parent_id' => $request->parent_id,
                    'photo' => $image_path
                ]);
    
                Category::fixTree();
                
    
                return redirect()->back();

            } else {
                return response('The parent of this node does not exist');
            }
        }
    }


    public function softDelete($id)
    {
        $sons = Category::where('parent_id', $id)->first();
        if (empty($sons)) {
            Category::where('id', $id)->delete();

            $category = Category::get()->toTree();

            Category::fixTree();
            return redirect()->back();
        }
        $category = Category::find($id);
        $category->deleteDescendants();
        $category->delete();
        Product::whereIn('category_id' , $id)->update([
            'category_id' => 'nuull'
        ]);
        
        Category::fixTree();
        return redirect()->back();

    }
}
