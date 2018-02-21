@extends('admin.shared.layout')
@section('title','Edit Category')
@section('content')
<div class="page-header">
    <h1>Edit Category</h1>
</div>
{!!Form::open(['url'=>'admin/categories/'.$category->id,'method'=>'put','enctype'=>'multipart/form-data'])!!}


<div class="form-group">
{{Form::label('name','Name')}}
{{Form::text('name',$category->name,['class'=>'form-control'])}}
</div>
@if($errors->any())
<div class="alert alert-danger">
    <ul>
    @foreach($errors->all() as $error)
      <li>{{$errors}}</li>
    @endforeach
</ul>
</div>
@endif
 

<div class="form-group">
    {{Form::label('desceription','Description')}}
    {{Form::textarea('description',$category->description,['class'=>'form-control'])}}
</div>
<div class="form-group">
        {{form::label('meta_descrition','Meta-Description')}}
        {{Form::textarea('meta_description',$category->meta_description,['class'=>'form-control'])}}
</div>
<div class="form-group">
        {{Form::label('meta_keyword','Meta-Keyword')}}
         {{Form::textarea('meta_keyword',$category->meta_keyword,['class'=>'form-control'])}}
      </div>
<div class="form-group">
{{Form::label('display_order','Display Order')}}
{{Form::text('display_order',$category->display_order,['class'=>'form-control'])}}
</div>

<div class="form-group">
    <label>Image</label>
    {{Form::file('image')}}
    @if($category->image!='')
    <img src="{{Storage::url($category->image)}}" style="height:200px;width:200px"/>
    @endif
</div>
<div class="form-inline">
    {{form::label('status','Status')}}
    <lable>{{Form::checkbox('status','',$category->status)}}Is Active</label>
</div>
    <button type="submit" class="btn btn-success btn-xs">Save</button>
    {{link_to('admin/categories','Back',['class'=>' btn btn-danger btn-xs'])}}
    
{{Form::Token()}}
{!!Form::close()!!}
@endsection
  