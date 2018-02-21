@extends('admin.shared.layout')
@section('title','Edit product')
@section('content')
<div class="page-header">
    <h1>Edit Product</h1>
</div>
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
{!!Form::open(['url'=>'admin/products/'.$product->id,'method'=>'put','enctype'=>'multipart/form-data'])!!}
<div class="form-group">
        {{Form::label('name','Name')}}
        {{Form::text('name',$product->name,['class'=>'form-control'])}}
    </div>
    <div class="form-group">
            {{Form::label('description','Description')}}
             {{Form::textarea('description',$product->description,['class'=>'form-control'])}}
          </div>
          
          <div class="form-group">
                {{Form::label('meta_description','Meta-Description')}}
                 {{Form::textarea('meta_description',$product->meta_description,['class'=>'form-control'])}}
              </div>
              <div class="form-group">
                    {{Form::label('meta_keyword','Meta-Keyword')}}
                     {{Form::textarea('meta_keyword',$product->meta_keyword,['class'=>'form-control'])}}
                  </div>
                  <div class="form-group">
                        {{Form::label('display_order','DisplayOrder')}}
                         {{Form::text('display_order',$product->display_order,['class'=>'form-control'])}}
                      </div>

          <div class="form-group">
                {{Form::label('price','Price')}}
                 {{Form::text('price',$product->price,['class'=>'form-control'])}}
              </div>
              <div class="form-group">
                    {{Form::label('quantity','Quantity')}}
                     {{Form::text('quantity',$product->quantity,['class'=>'form-control'])}}
                  </div>
    
    <div class="form-group">
            <label>Image</label>
            {{Form::file('image')}}
            @if($product->image!='')
            <img src="{{Storage::url($product->image)}}" style="height:200px;width:200px"/>
            @endif
        </div>
        <div class="form-inline">
            {{form::label('status','Status')}}
            <lable>{{Form::checkbox('status','',$product->status)}}Is Active</label>
        </div>



    
    
        <button type="submit" class="btn btn-success btn-xs">Save</button>
        {{link_to('admin/products','Back',['class'=>' btn btn-danger btn-xs'])}}
        
    {{Form::Token()}}
    {!!Form::close()!!}
    @endsection
      