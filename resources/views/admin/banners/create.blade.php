@extends('admin.shared.layout')
@section('title','Add banner')
@section('content')
<div class="page-header">
    <h1>Add Banner</h1>
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

        
{!!Form::open(['url'=>'admin/banners','method'=>'post','enctype'=>'multipart/form-data'])!!}
<div class="form-group">
{{Form::label('title','Title')}}
{{Form::text('title','',['class'=>'form-control'])}}
</div>
 
<div class="form-group">
    {{Form::label('created_at','AddedDate')}}
    {{Form::text('created','',['class'=>'form-control'])}}
</div>
<div class="form-group">
    {{Form::label('desceription','Description')}}
    {{Form::textarea('description','',['class'=>'form-control'])}}

    <div class="form-group">
        {{form::label('meta_descrition','Meta-Description')}}
        {{Form::textarea('meta_description','',['class'=>'form-control'])}}
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
    {{link_to('admin/banners','Back',['class'=>' btn btn-danger btn-xs'])}}
    {{Form::Token()}}
{!!Form::close()!!}
@endsection