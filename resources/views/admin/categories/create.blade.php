@extends('admin.shared.layout') 
@section('title','Add Categories') 
@section('content')
<div class="page-header">
  <h1>Add Category</h1>
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
{!!Form::open(['url'=>'admin/categories','method'=>'post','enctype'=>'multipart/form-data'])!!}
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
        {{Form::label('created_at','AddedDate')}}
         {{Form::text('created','',['class'=>'form-control'])}}
      </div>
      <div class="form-group">
        {{Form::label('updated_at','ModifiedDate')}} {{Form::text('updated_at','',['class'=>'form-control'])}}
      </div>
      <div class="form-group">
        {{Form::label('desceription','Description')}} {{Form::textarea('description','',['class'=>'form-control'])}}
      </div>
      <div class="form-group">
        {{Form::label('display_order','Display Order')}} {{Form::text('display_order','',['class'=>'form-control'])}}
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
      {{Form::label('meta_keyword','Meta-Keyword')}} {{Form::textarea('meta_keyword','',['class'=>'form-control'])}}
    </div>
  </div>
</div>




<button type="submit" class="bt btn-success btn-xs">Save</button> {{link_to('admin/categories','Back',['class'=>' btn btn-danger
btn-xs'])}} {{Form::Token()}} {!!Form::close()!!}
@endsection