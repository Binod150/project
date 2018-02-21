<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Http\Requests\BannerRequest;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Storage;
class AdminBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.banners.index',[
            'banners'=>Banner::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {    
        
      $this->_save(new Banner(),$request);
      return redirect('admin/banners');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.banners.edit',[
            'banner'=>Banner::find($id)

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, Banner $banner)
    {
        $this->_save($banner,$request);
        return redirect('admin/banners');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect('admin\banners');
    }

    public function sample(){
        return view('admin.banners.sample');
    }
   private function _save(Banner $banner, Request $request){
        $banner->title=$request->input('title');
        $banner->description=$request->input('description');
        $banner->meta_description=$request->input('meta_description');
        $banner->status=$request->has('status');
        if($request->hasFile('image')){
            $request->file('image');
            $banner->image=Storage::putFile('public',$request->image);
        }
            $banner->save();

        }
    }

