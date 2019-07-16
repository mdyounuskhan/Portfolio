<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Contact;
use App\Mail\ContactMessage;
use Mail;

class FrontendController extends Controller
{
    function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view ('home', compact('products', 'categories'));
    }

    function productdetails($product_id)
    {
        $single_product_info = Product::find($product_id);
        $releted_products = Product::where('id', '!=', '$product_id')->where('category_id', $single_product_info->category_id)->get();
        return view ('frontend.productdetails', compact('single_product_info', 'releted_products'));
    }
    function categoryproduct($category_id)
    {
        $categoryproducts = Product::where('category_id', $category_id)->get();
        $single_categorys = Category::findOrFail($category_id);
        return view ('frontend.categoryproduct', compact('categoryproducts', 'single_categorys'));
    }
    function contact()
    {
        return view('frontend.contact');
    }
    function contactinsert(Request $request)
    {
        //jodi table name ar form ar field name ak rokom hoy tahole ak line a insert kora jay kinto csrf token except korte hobe
        Contact::insert([$request->except('_token')]);
        //Send To Email This User
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $subject = $request->subject;
        $message = $request->message;
        Mail::to($request->user())->send(new ContactMessage($first_name, $last_name, $subject,  $message));

        return back()->withStatus('Your Contact Messgae Submited & Check This Email');
    }

}
