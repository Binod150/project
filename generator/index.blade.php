@extends('layout')
@section('title')
@section('content')
<div class="page-header">
    <h1>Add Title</h1>
</div>
<div class='pull-right'>
    <p>
    <a href="{{url(admin/controller)}}" class="btn btn-primary btn-xs"/>
    <span class="glyphicon glyphicon-plus"/>
    </a>
</p>
</div>
<table class="table">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>AddedDate</th>
        <th>Status</th>
        <th>Action</th>
        <th>
    </tr>
   @foreach($models as $m)
         <tr>
             <td>{{$m->id}}</td>
             <td>{{$m->Name}}</td>
             <td>{{$m->created_at}}</td>
             <td>
                 @if(status)

                 <label class="label label-success">Active</label>
                 <label class="label label-danger">Inactive</label>
             </td>
             <td>
                 {!!Form::open('[url'=>'admin/controller.$m->id','Method'=>'Delete'])!!}
                  <a href="{{url(admin/controller.$m->id./edit)}}" class="btn btn-success btn-xs"/>
                    <span class="glyphion glyphion-pencile"/>
                  </a>
                  {{Form::token()}}
                  <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                  <span class"glyphicon glyphicon-trash"/>
                  {!!Form::close()!!}
                </td>
         </tr>


</table>

@endsection