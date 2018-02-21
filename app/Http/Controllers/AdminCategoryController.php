<?php

namespace App\Http\Controllers;

use App\Category;
use App\Repositories\CategoryInterface;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCategoryController extends Controller
{   
      private $repository;
      public function __construct(CategoryInterface $repository){
          return $this->repository=$repository;
      }
        
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {     
        $categorys=null;
        if($request->has("q"))
        {
           $params='%'.$request->input('q').'%';
           $categorys=Category::where('name','like',$params)
           
           ->get();
        }else{
            $categorys=$this->repository->getAll();
        }
        return view('admin.categories.index',[
             'categories'=>$categorys
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {   
        
        $this-> _save(new Category(),$request);
        return redirect('admin/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
   
        

    {
        return view('admin.categories.edit',[
               'category'=>Category::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
   
    public function update(CategoryRequest $request, Category $category)
    {    

        $this->_save($category,$request);
        return redirect('admin/categories');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('admin\categories');
    }
    private function _save(Category $category,Request $request){
        $category->name=$request->input('name');
        $category->description=$request->input('description');
        $category->meta_description=$request->input('meta_description');

        $category->meta_keyword=$request->input('meta_keyword');
        $category->display_order=$request->input('display_order');
        $category->updated_at=$request->input('updated_at');
        $category->created_at=$request->input('created_at');
        $category->status=$request->has('status');
        if($request->hasFile('image')){
            $request->file('image');
            $category->image=Storage::putFile('public',$request->image);

        }
       $category->save();
    }
}
