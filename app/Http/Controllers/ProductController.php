<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductGallery;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $datas = Product::all()->sortByDesc('updated_at');
        $user = User::all();
        $category = ProductCategory::all();
        $galleries = ProductGallery::get();

        return view(
            'admin.product.index',
            compact('datas'),
            compact('user'),
            compact('category'),
        );
    }

    public function create()
    {
        return view('admin.product.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'seller_id' => 'required',
            // 'galleries_id' => 'required',
            // 'category_id' => 'required',
            'title' => 'required',
            'price' => 'required',
            'weight' => 'required',
            'stock' => 'required',
            'publish' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ]);

        $product = Product::create([
            'seller_id' => 1,
            'galleries_id' => 2,
            // 'seller_id' => $request->seller_id,
            // 'galleries_id' => $request->galleries_id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'price' => $request->price,
            'weight' => $request->weight,
            'stock' => $request->stock,
            'publish' => $request->publish,
            'tags' => $request->tags,
            'description' => $request->description
        ]);

        // $product = new Product;
        // $product->seller_id = '1';
        // $product->galleries_id = '2';
        // // $product->seller_id = $request->seller_id;
        // // $product->galleries_id = $request->galleries_id;
        // $product->category_id = $request->category_id;
        // $product->title = $request->title;
        // $product->price = $request->price;
        // $product->weight = $request->weight;
        // $product->stock = $request->stock;
        // $product->publish = $request->publish;
        // $product->tags = $request->tags;
        // $product->description = $request->description;
        // dd($product);
        // $product->save();

        if ($product) {
            return redirect('products')->with('successfully', 'Product added successfully');
        } else {
            return redirect('products')->with('error', 'Product failed to add');
        }
    }

    public function show($id)
    {
        $showDetail = Product::find($id);
        return view('admin.product.detail', compact(
            'showDetail'
        ));
    }
}
