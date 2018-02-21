<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Http\Requests\BrandRequest;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Storage;
class AdminBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.brands.index',[
            'brands'=>Brand::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     */
    public function store(BrandRequest $request)
    {
        $this->_save(new Brand(),$request);
      return redirect('admin/brands');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.brands.edit',[
            'brands'=>Brand::find($id)

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, Brand $brand)
    {
        $this->_save($brand,$request);
        return redirect('admin/brands');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $banner->delete();
        return redirect('admin\brands');
    }
    private function _save(Brand $brand, Request $request){
        $brand->name=$request->input('name');
        $brand->description=$request->input('description');
        $brand->status=$request->has('status');
        if($request->hasFile('image')){
            $request->file('image');
            $brand->image=Storage::putFile('public',$request->image);
        }
            $brand->save();

        }
}
