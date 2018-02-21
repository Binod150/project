@extends('admin.shared.layout')
@section('title','Add Product')
@section('content')
<div class="page-header">
    <h1>Add Product</h1>
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

        
{!!Form::open(['url'=>'admin/products','method'=>'post','enctype'=>'multipart/form-data'])!!}
<div>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#details" aria-controls="details" role="tab" data-toggle="tab">Details</a></li>
    <li role="presentation"><a href="#meta" aria-controls="meta" role="tab" data-toggle="tab">Meta</a></li>
  </ul>
  <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="details">
  
      <div class="form-group">
        {{Form::label('name','Name')}}
         {{Form::text('name','',['class'=>'form-control'])}}
      </div>
      
      
      <div class="form-group">
        {{Form::label('desceription','Description')}}
         {{Form::textarea('description','',['class'=>'form-control'])}}
      </div>
      <div class="form-group">
        {{Form::label('price','Price')}}
         {{Form::text('price','',['class'=>'form-control'])}}
      </div>
      <div class="form-group">
            {{Form::label('quantity','Quantity')}}
             {{Form::text('quantity','',['class'=>'form-control'])}}
          </div>
          

      <div class="form-group">
        <label>Image</label>
         {{Form::file('image')}}
      </div>
      <div class="form-inline">
        {{form::label('status','Status')}}
        <lable>{{Form::checkbox('status')}}Is Active</label>
      </div>
    </div>
  
  <div role="tabpanel" class="tab-pane" id="meta">
    <div class="form-group">
      {{form::label('meta_descrition','Meta-Description')}}
       {{Form::textarea('meta_description','',['class'=>'form-control'])}}
    </div>
    <div class="form-group">
      {{Form::label('meta_keyword','Meta-Keyword')}}
       {{Form::textarea('meta_keyword','',['class'=>'form-control'])}}
    </div>
    <div class="form-group">
            {{Form::label('display_order','DisplayOrder')}}
             {{Form::text('display_order','',['class'=>'form-control'])}}
          </div>
  </div>
</div>




<button type="submit" class="bt btn-success btn-xs">Save</button> {{link_to('admin/products','Back',['class'=>' btn btn-danger
btn-xs'])}} {{Form::Token()}} {!!Form::close()!!}
@endsection
