@extends('admin.shared.layout')
@section('title','Banners')
@section('content')
<div class="page-header">
    <h1>Add Banner</h1>
</div>
<div class="pull-right">
    <p>
    <a href="{{url('admin/banners/create')}}" class="btn btn-primary btn-xs">
    <span class="glyphicon glyphicon-plus"/>
    </a>
</p>
</div>
<table class="table">
    <tr>
        <th>Id</th>
        <th>Banner</th>
        <th>Title</th>
        <th>AddedDate</th>
        
        <th>Status</th>
        <th>Action</th>
        <th>
    </tr>
   @foreach($banners as $m)
         <tr>
             <td>{{$m->id}}</td>
             <td>
                 <img src="{{Storage::url($m->image)}}" style="height:100px;width:100px"/>
                </td>
             <td>{{$m->title}}</td>
             <td>{{$m->created_at}}</td>
             <td>
                 @if($m->status)

                 <label class="label label-success">Active</label>
                @else
                 <label class="label label-danger">Inactive</label>
                 @endif
             </td>
             <td>
                 {!!Form::open(['url'=>'admin/banners/'.$m->id,'method'=>'Delete'])!!}
                  <a href="{{url('admin/banners/'.$m->id.'/edit')}}" class="btn btn-success btn-xs">
                <span class="glyphicon glyphicon-pencil"/>
                  </a>
                  {{Form::token()}}
                  <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                </td>
         </tr>
        @endforeach

</table>

@endsection