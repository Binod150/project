<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProductRequest;
use App\Repositories\ProductInterface;
use App\Category;
use App\Product;
use App\Brand; 
use App\Banner;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Storage;

class AdminProductController extends Controller
{      
    private $repository;
      public function __construct(ProductInterface $repository){
          return $this->repository=$repository;
      }
        
    /** $categorys=null;
     *  private $repository;
          

     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {      $product=null;
        if($request->has("q"))
        {
           $params='%'.$request->input('q').'%';
           $products=Product::where('name','like',$params)
           
           ->get();
        }else{
            $products=$this->repository->getAll();
        }
        return view('admin.products.index',[
            'products'=>$products,
            'category'=>$this->getFromCategories(),
            'brand'=>$this->getFromBrands(),
            'banner'=>$this->getFromBanners()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.products.create');
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $this->_save(new Product(),$request);
      return redirect('admin/products');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.products.edit',[
            'product'=>Product::find($id)

        ]);
    }

    private function getFromCategories(){
        $categories=[];
        foreach(Category::all() as $c){
            $categories[$c->id]=$c->name;
        }
        return $categories;
    }
    private function getFromBrands(){
         $brands=[];
         foreach(Brand::all() as $b){
             $brands[$b->id]=$b->name;
         }
            return $brands;
    } 
    private function getFromBanners(){
        $banners=[];
        foreach(Banner::all() as $d){
            $banners[$d->id]=$d->title;
        }
        return $banners;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */ 
    public function update(ProductRequest $request, Product $product)
    {
        $this->_save($product,$request);
        return redirect('admin/products');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('admin\products');
    }
    private function _save(Product $product, Request $request){
        $product->name=$request->input('name');
        $product->description=$request->input('description');
        $product->meta_description=$request->input('meta_description');
        $product->meta_keyword=$request->input('meta_keyword');
        $product->display_order=$request->input('display_order');
        $product->quantity=$request->input('quantity');
        $product->price=$request->input('price');
        $product->status=$request->has('status');
        $product->updated_at=$request->input('updated_at');
        $product->created_at=$request->input('created_at');
        if($request->hasFile('image')){
            $request->file('image');
            $product->image=Storage::putFile('public',$request->image);
        }
            $product->save();

        }
}
