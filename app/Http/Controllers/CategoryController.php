<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Carbon\Carbon;

class CategoryController extends Controller
{
    function addproductcategory()
    {
        return view('admin.category.view');
    }
    function addcategorylist()
    {
        $categories = Category::all();
        return view('admin.category.categorylist', compact('categories'));
    }
    function addcategoryinsert(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories,category_name'
        ]);
        if (isset($request->menu_status)) {
            Category::insert([
                'category_name' => $request->category_name,
                'menu_status' => true,
                'created_at' => Carbon::now()
            ]);
        }
        else {
            Category::insert([
                'category_name' => $request->category_name,
                'menu_status' => true,
                'created_at' => Carbon::now(),
            ]);
        }
        return back()->with('status', 'Category Added Successfully');
    }

    function deletecategory($category_id)
    {
        Category::where('id', $category_id)->delete();
        return back();
    }

    function changemenustatus($category_id)
    {
        if (Category::find($category_id)->menu_status == 0) {
            Category::find($category_id)->update([
                'menu_status' => true,
            ]);
        }
        else {
            Category::find($category_id)->update([
                'menu_status' => false,
            ]);
        }
        return back();

        //onno babe kora jay
        // $category_info = Category::find($category_id);
        // if ($category_id->menu_status == 0) {

        //      $category_info->menu_status = true;
        // }
        // else {
        //     $category_info->menu_status = false;
        // }
        // $category_info->save();
        // return back();
    }


}
