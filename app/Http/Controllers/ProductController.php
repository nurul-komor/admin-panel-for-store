<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\Brand;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "All Products";
        $primaryClass = "Products";
        $secondaryClass = "add-Product";
        $products = Product::with('getBrand')->get();
        $data = compact('title','primaryClass','secondaryClass','products');
        return view('products')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add Product";
        $url = "dashboard/products";
        $formTitle = "Create Product";
        $brands = Brand::all();
        $data = compact('url','formTitle','title','brands');
        return view('product-register')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
         $product = new Product;
       $product->product_name = $request->productName;
       $product->imei_1 = $request->imei_1;
       $product->imei_2 = $request->imei_2;
       $product->model_no = $request->model_no;
       $product->product_code = $request->product_code;
       $product->qty = $request->qty;
       $product->price = $request->price;
       $product->details = $request->details;
       $product->brand_id = $request->brand_id;
        $destinationPath = 'uploads';
       $productImage = time().'-'.pathinfo($request->file('productImage')->getClientOriginalName(),PATHINFO_FILENAME).'.'. $request->file('productImage')->getClientOriginalExtension();
        echo $request->file('productImage')->move(public_path($destinationPath), $productImage);
        // die;
       $product->product_image = $productImage;
      $product->save();
      session()->flash('flashMessage','Product Created');
      return redirect()->route('dashboard.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $title = "Edit product";
        $url =  "dashboard/products/".$product->id;
        $product = Product::find($product->id);
        $brands = Brand::all();
        $formTitle = "Edit product";
        $data = compact('url','formTitle','title','product','brands');
        return view('product-register')->with($data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        if(!is_null($product)){
            $product = Product::find($product->id);
            $product->product_name = $request->productName;
            $product->imei_1 = $request->imei_1;
            $product->imei_2 = $request->imei_2;
            $product->model_no = $request->model_no;
            $product->product_code = str_replace('#', '', $request->product_code);
            $product->qty = $request->qty;
            $product->price = $request->price;
            $product->details = $request->details;
            $product->brand_id = $request->brand_id;

            if(!is_null($request->file('brandLogo'))){
                $destinationPath = 'uploads';
                $brandLogoName = time().'-'.pathinfo($request->file('brandLogo')->getClientOriginalName(),PATHINFO_FILENAME).'.'. $request->file('brandLogo')->getClientOriginalExtension();
                $request->file('brandLogo')->move(public_path($destinationPath), $brandLogoName);
                $brand->brand_logo = $brandLogoName;

            }
             $product->save();
             session()->flash('flashMessage','updated successfully');
        }
        return redirect()->route('dashboard.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
   public function destroy(Product $product)
    {
         if(!(is_null($product))){
            $product = Product::find($product->id);
            $product->delete();
            session()->flash('flashMessage','Moved to trash successfully');
        }
        return redirect()->route('dashboard.products.index');
    }
    public function trash(){
        $title = "Trashed Products";
        $primaryClass = "products";
        $secondaryClass = "add-Brand";
        $trashes = Product::onlyTrashed()->with('getBrand')->get();
        $data = compact('title','primaryClass','secondaryClass','trashes');
        if(!(is_null($trashes))){
            return view('product-trashes')->with($data);
        }
    }
    public function restoreProduct($product){
         if(!(is_null($product))){
            Product::onlyTrashed($product)->find($product)->restore();
            session()->flash('flashMessage','Restored successfully');
        }
        return redirect()->route('dashboard.product.trashes');
    }
    public function forceDelete( $product){
        if(!(is_null($product))){
            Product::onlyTrashed($product)->find($product)->forceDelete();
            session()->flash('flashMessage','Deleted by force ');
        }
        return redirect()->route('dashboard.product.trashes');
    }
}