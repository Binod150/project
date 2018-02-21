@extends('admin.shared.layout') 
@section('title','Add Brands') 
@section('content')
<div class="page-header">
  <h1>Add Brand</h1>
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
{!!Form::open(['url'=>'admin/brands','method'=>'post','enctype'=>'multipart/form-data'])!!}

      <div class="form-group">
        {{Form::label('name','Name')}}
         {{Form::text('name','',['class'=>'form-control'])}}
      </div>
      
     
      <div class="form-group">
        {{Form::label('desceription','Description')}} {{Form::textarea('description','',['class'=>'form-control'])}}
      </div>

      <div class="form-group">
            <label>Image</label>
             {{Form::file('image')}}
       </div>
      
      <div class="form-inline">
        {{form::label('status','Status')}}
        <lable>{{Form::checkbox('status')}}Is Active</label>
      </div>
    
  
 

     <button type="submit" class="bt btn-success btn-xs">Save</button>
       {{link_to('admin/brands','Back',['class'=>' btn btn-danger btn-xs'])}}
       {{Form::Token()}}
        {!!Form::close()!!}
@endsection