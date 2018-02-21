@extends('admin.shared.layout')
@section('title','Edit Brands')
@section('content')
<div class="page-header">
    <h1>Edit Brand</h1>
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
{!!Form::open(['url'=>'admin/brands/'.$brands->id,'method'=>'put','enctype'=>'multipart/form-data'])!!}


<div class="form-group">
    {{Form::label('name','Name')}}
    {{Form::text('name',$brands->name,['class'=>'form-control'])}}
</div>

<div class="form-group">
        {{form::label('descrition','Description')}}
        {{Form::textarea('description',$brands->description,['class'=>'form-control'])}}
</div>

<div class="form-group">
      <label>Image</label>
      {{Form::file('image')}}
      @if($brands->image!='')
    <img src="{{Storage::url($brands->image)}}" style="height:200px;width:200px"/>
    @endif
</div>
<div class="form-inline">
    {{form::label('status','Status')}}
    <lable>{{Form::checkbox('status','',$brands->status)}}Is Active</label>
</div>
    <button type="submit" class="btn btn-success btn-xs">Save</button>
    {{link_to('admin/categories','Back',['class'=>' btn btn-danger btn-xs'])}}
    
{{Form::Token()}}
{!!Form::close()!!}
@endsection
  