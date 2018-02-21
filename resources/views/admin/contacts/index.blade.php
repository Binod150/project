@extends('admin.shared.layout')
@section('title','Contact')
@section('content')
<div class="page-header">
    <h1>Contact</h1>
    <div class="row">
    <div class="col-xs-7 col-sm-6 col-lg-8">
        <form action="{{url('admin\contacts')}}">
            <input type="text" name="q" placeholder="search.........."/>
            <a href="{{url('admin\contacts')}}" class="btn btn-danger btn-xs">
                Clear
            </a>
            {{csrf_field()}}
        </form>
    </div>
</div>
<div class="pull-right">
    <p>
    <a href="{{url('admin/contacts/create')}}" class="btn btn-primary btn-xs">
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
        <th>
    </tr>
   @foreach($contact as $m)
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
                    
                 {!!Form::open(['url'=>'admin/contacts/'.$m->id,'method'=>'Delete'])!!}
                  <a href="{{url('admin/contacts/'.$m->id.'/edit')}}" class="btn btn-success btn-xs">
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

