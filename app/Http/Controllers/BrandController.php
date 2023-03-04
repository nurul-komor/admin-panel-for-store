<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "All Brands";
        $primaryClass = "brands";
        $secondaryClass = "add-Brand";
        $brands = Brand::all();
        $data = compact('title','primaryClass','secondaryClass','brands');
        // if(!(is_null($brands))){
            return view('brands')->with($data);
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add Brand";
        $url =  "dashboard/brands";
        $formTitle = "Create Brand";
        $data = compact('url','formTitle','title');
        return view('brand-create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBrandRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrandRequest $request)
    {
        
       $brand = new Brand;
       $brand->brand_name = $request->brandName;
        $destinationPath = 'uploads';
       $brandLogoName = time().'-'.pathinfo($request->file('brandLogo')->getClientOriginalName(),PATHINFO_FILENAME).'.'. $request->file('brandLogo')->getClientOriginalExtension();
       echo $request->file('brandLogo')->move(public_path($destinationPath), $brandLogoName);
       $brand->brand_logo = $brandLogoName;
      $brand->save();
      session()->flash('flashMessage','Brand Created');
      return redirect()->route('dashboard.brands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        $title = "Edit Brand";
        $url =  "dashboard/brands/".$brand->id;
        $id = $brand->id;
        $formTitle = "Edit Brand";
        $data = compact('url','formTitle','title','brand');
        return view('brand-create')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBrandRequest  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        
        if(!is_null($brand)){
            $brand = Brand::find($brand->id);
            $brand->brand_name = $request->brandName;
            if(!is_null($request->file('brandLogo'))){
                $destinationPath = 'uploads';
                $brandLogoName = time().'-'.pathinfo($request->file('brandLogo')->getClientOriginalName(),PATHINFO_FILENAME).'.'. $request->file('brandLogo')->getClientOriginalExtension();
                $request->file('brandLogo')->move(public_path($destinationPath), $brandLogoName);
                $brand->brand_logo = $brandLogoName;

            }
             $brand->save();
             session()->flash('flashMessage','updated successfully');
        }
        return redirect()->route('dashboard.brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
         if(!(is_null($brand))){
            $id = Brand::find($brand->id);
            $brand->delete();
            session()->flash('flashMessage','Moved to trash successfully');
        }
        return redirect()->route('dashboard.brands.index');
    }
    public function trash(){
        
        // p($trashes);
        $title = "Trashed Brands";
        $primaryClass = "brands";
        $secondaryClass = "add-Brand";
        $trashes = Brand::onlyTrashed()->get();
        $data = compact('title','primaryClass','secondaryClass','trashes');
        if(!(is_null($trashes))){
            return view('brand-trashes')->with($data);
        }
    }
    public function restoreBrand($brand){
         if(!(is_null($brand))){
            Brand::onlyTrashed($brand)->find($brand)->restore();
            session()->flash('flashMessage','Restored successfully');
        }
        return redirect()->route('dashboard.brand.trashes');
    }
    public function forceDelete( $brand){
        if(!(is_null($brand))){
            Brand::onlyTrashed($brand)->find($brand)->forceDelete();
            session()->flash('flashMessage','Deleted by force ');
        }
        return redirect()->route('dashboard.brand.trashes');
    }
}