<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Image;
use App\Category;

class ProductController extends Controller
{
    function index()
    {
        $categories = Category::all();
        return view('admin.product.addproduct', compact('categories'));
    }

    function productinsert(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'product_name' => 'required',
            'product_description' => 'required',
            'price' => 'required',
            'product_stock' => 'required',
            'stock_alert' => 'required',
        ]);

        $last_inserted_id = Product::insertGetId([
            'category_id' => $request->category_id,
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'price' => $request->price,
            'product_stock' => $request->product_stock,
            'stock_alert' => $request->stock_alert,
        ]);
        if ($request->hasFile('product_image')) {
            $upload_photos = $request->product_image;
            $filename = $last_inserted_id.".".$upload_photos->getClientOriginalExtension();
            Image::make($upload_photos)->resize(394,451)->save(base_path('public/uploads/product_photos/'.$filename));
            Product::find($last_inserted_id)->update([
                'product_image' => $filename
            ]);
        }
        return back()->with('status', 'Product Added Successfully!!');
    }

    function addedpoductlist()
    {
        $products = Product::paginate(5);
        $delete_products = Product::onlyTrashed()->get();
        return view('admin.product.productlist', compact('products', 'delete_products'));
    }

    function deleteproduct($id)
    {
        Product::where('id', $id)->delete();
        return back()->with('deletestatus', 'Product Deleted Successfully!!');
    }
    function productprofile()
    {
        return view('admin.product.product_profile');
    }

    function editproduct($id)
    {
        $categories = Category::all();
         $single_products = Product::findOrFail($id);
        return view ('admin.product.editproduct', compact('single_products', 'categories'));
    }


    function editproductinsert(Request $request)
    {   //default photo jeno delete na hoy
        if ($request->hasFile('product_image')) {
            if(Product::find($request->product_id)->product_image == 'defaultproductphoto.jpg'){
                $upload_photos = $request->product_image;
                $filename = $request->product_id.".".$upload_photos->getClientOriginalExtension();
                Image::make($upload_photos)->resize(394,451)->save(base_path('public/uploads/product_photos/'.$filename));
                Product::find($request->product_id)->update([
                    'product_image' => $filename
                    ]);
            }
            else {
                //First Delete the old photo
                $delete_this_file = Product::find($request->product_id)->product_image;
                unlink(base_path('public/uploads/product_photos/'.$delete_this_file));
                //Now upload the new photo
                $upload_photos = $request->product_image;
                $filename = $request->product_id . "." . $upload_photos->getClientOriginalExtension();
                Image::make($upload_photos)->resize(394, 451)->save(base_path('public/uploads/product_photos/' . $filename));
                Product::find($request->product_id)->update([
                    'product_image' => $filename,
                    ]);

            }
    }
       Product::find($request->product_id)->update([
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'price' => $request->price,
            'product_stock' => $request->product_stock,
            'stock_alert' => $request->stock_alert,
       ]);
       return back()->with('updatestatus', 'Product Updated Successfully!!');
    }

    function restoreproduct($id)
    {
        Product::onlyTrashed()->where('id', $id)->restore();
        return back()->with('restore', 'Product Restore Successfully!!');
    }

    function Permanentlydeleteproduct($id)
    {
        $delete_this_file = Product::onlyTrashed()->find($id)->product_image;
        unlink(base_path('public/uploads/product_photos/' . $delete_this_file));

        Product::onlyTrashed()->find($id)->forceDelete();
        return back()->with('Permanentlydelete', 'Product Permanently Deleted Successfully!!');
    }


}
