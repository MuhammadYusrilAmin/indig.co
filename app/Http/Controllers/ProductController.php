<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductGallery;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $datas = Product::where('cooperative_id', Auth::user()->cooperative_id)->orderBy('created_at', 'desc')->get();
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = ProductCategory::get();
        return view('admin.product.add', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'weight' => 'required',
            'stock' => 'required',
            'publish' => 'required',
            'category_id' => 'required',
            'foto' => 'required',
            'description' => 'required'
        ]);

        $id = mt_rand(1000, 99999);
        date_default_timezone_set('Asia/Jakarta');
        $product = Product::create([
            'id' => $request->id_barang,
            'cooperative_id' => Auth::user()->cooperative_id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'price' => $request->price,
            'weight' => $request->weight,
            'stock' => $request->stock,
            'status' => $request->publish,
            'tags' => $request->tags,
            'tanggal' => date('Y-m-d'),
            'description' => $request->description
        ]);

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $new_image = rand() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('assets/images/products'), $new_image);
            ProductGallery::create([
                'product_id' =>  $request->id_barang,
                'photo_url' => 'assets/images/products/' . $new_image,
            ]);
        }

        if ($request->hasFile('files')) {
            $files = $request->file('files');
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $rand = Str::random(5);
                $rand1 = Str::random(3);
                $fileName = $rand . "-" . date('his') . "-" . $rand1 . "." . $extension;
                $destinationPath = 'assets/images/products' . '/';
                $file->move($destinationPath, $fileName);


                ProductGallery::create([
                    'product_id' =>  $request->id_barang,
                    'photo_url' => 'assets/images/products/' . $fileName,
                ]);
            }
        }

        if ($product) {
            return redirect('products')->with('successfully', 'Product added successfully');
        } else {
            return redirect('products')->with('error', 'Product failed to add');
        }
    }

    public function show()
    {
        $id = $_GET['id'];
        $showDetail = Product::find($id);
        return view('admin.product.detail', compact(
            'showDetail'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $category = ProductCategory::all();

        return view(
            'admin.product.edit',
            compact('product'),
            compact('category'),
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'weight' => 'required',
            'stock' => 'required',
            'publish' => 'required',
            'category_id' => 'required',
            'description' => 'required'
        ]);

        $product = Product::find($id);
        $product->title = $request->title;
        $product->price = $request->price;
        $product->weight = $request->weight;
        $product->stock = $request->stock;
        $product->status = $request->publish;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->update();

        if ($product) {
            return redirect('products')->with('successfully', 'Product updated successfully');
        } else {
            return redirect('products')->with('error', 'Product failed to updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product =  Product::find($id);
        $gallery =  ProductGallery::where('product_id', $id)->get();
        foreach ($gallery as $value) {
            $location = $value->photo_url;
            if (File::exists($location)) {
                File::delete($location);
            }
        }
        ProductGallery::where('product_id', $id)->delete();
        $product->delete();
        return redirect('products')->with('successfully', 'Product added successfully');
    }
}
