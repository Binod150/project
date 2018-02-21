@extends('admin.shared.layout')
@section('title','Brand')
@section('content')
<div class="page-header">
    <h1>Brand</h1>
</div>

  
<div class="pull-right">
    <p>
    <a href="{{url('admin/brands/create')}}" class="btn btn-primary btn-xs">
    <span class="glyphicon glyphicon-plus"/>
    </a>
</p>
</div>
<table class="table">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Description</th>
        <th>Image</th>
        <th>AddedDate</th>
        <th>ModifiedDate</th>
        <th>Status</th>
        <th>Action</th>
        
    </tr>
   @foreach($brands as $m)
         <tr>
             <td>{{$m->id}}</td>
             <td>{{$m->name}}</td>
             <td>{{$m->description}}</td>
             <td>
                <img src="{{Storage::url($m->image)}}" style="height:100px;width:100px"/>
             </td>
             
             <td>{{$m->created_at}}</td>
             <td>{{$m->updated_at}}</td>
             <td>
                 @if($m->status)

                 <label class="label label-success">Active</label>
                 @else
                 <label class="label label-danger">Inactive</label>
                 @endif
             </td>
             <td>
                    
                 {!!Form::open(['url'=>'admin/brands/'.$m->id,'method'=>'Delete'])!!}
                  <a href="{{url('admin/brands/'.$m->id.'/edit')}}" class="btn btn-success btn-xs">
                    <span class="glyphicon glyphicon-pencil"/>
                  </a>
                  {{Form::token()}}
                  <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                  <span class"glyphicon glyphicon-trash"/>
                  {!!Form::close()!!}
                </td>
         </tr>

@endforeach

</table>
@endsection