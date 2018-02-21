@extends('admin.shared.layout')
@section('title','Product')
@section('content')
<div class="page-header">
        <h1>Product</h1>
    </div>
    
<div id="googleMap" style="right:20px;width:100%;height:240px;"></div>

<script>
function myMap() {
var mapProp= {
    center:new google.maps.LatLng(28.019682,83.804871),
    zoom:5,
};
var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXMeYzlQCxJfPZKThDzk5omhUgceuVH_E
&callback=myMap"></script>






<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-header">
    <a class="navbar-brand" href="{{url('admin/brands')}}">Brand</a>
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>
  <div class="navbar-collapse collapse">
    <ul class="nav navbar-nav">
      <li class="active"><a href="{{url('/home')}}">Home</a></li>
      <li><a href="#about">About</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
    <div class="navbar-header navbar-right">
      	<p class="navbar-text">
  		<a href="#" class="navbar-link"></a>
  		</p>
  	</div>
  </div>
</nav>

<div class="container-fluid">
  <span id="monitor"></span>
</div>

		
<a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Link
  </a>
  <div class="collapse" id="collapseExample">
    <div class="well">
            {!!Form::open(['url'=>'admin/products','method'=>'post','enctype'=>'multipart/form-data'])!!}
            <div class="row">
                   <div class="col-md-4">
                    <div class="form-group">
                    {{Form::label('name','Name')}}
                    {{Form::text('name','',['class'=>'form-control'])}}
                    </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {{Form::label('name','Category')}}
                    {{Form::select('name',$category,null,['placeholder'=>'select Category','class'=>'form-control'])}}
                 </div>
                </div>
            
            <div class="col-md-4">
                 <div class="form-group">
                        {{Form::label('name','Brand')}}
                         {{Form::select('name',$brand,null,['placeholder'=>'select Brand','class'=>'form-control'])}}
                 </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                           {{Form::label('title','Banner')}}
                            {{Form::select('title',$banner,null,['placeholder'=>'select Banner','class'=>'form-control'])}}
                    </div>
                   </div>
                <div class="row">
                <div class="col-md-1">
                        <div class="form-group">
                               {{Form::label('price','Price')}}
                                {{Form::text('price','',['class'=>'form-control'])}}
                        </div>
                       </div>
                    </div>
                    

                </div>
                <label>{{Form::checkbox('')}}has featured</label>
       
                     
             {{Form::Token()}}
            {!!Form::close()!!}
            </div>
  </div>
  <div class="row">
        <div class="col-xs-7 col-sm-6 col-lg-8">
            <form action="{{url('admin\products')}}">
                <input type="text" name="q" placeholder="search.........."/>
                <a href="{{url('admin\products')}}" class="btn btn-danger btn-xs">
                    Clear
                </a>
                {{csrf_field()}}
            </form>
        
        </div>
    </div>
  
  
<div class="pull-right">
    <p>
    <a href="{{url('admin/products/create')}}" class="btn btn-primary btn-xs">
    <span class="glyphicon glyphicon-plus"/>
    </a>
</p>
</div>
<table class="table">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Description</th>
        <th>price</th>
        <th>Quantity</th>
        <th>Image</th>
        <th>AddedDate</th>
        <th>ModifiedDate</th>
        <th>Status</th>
        <th>Action</th>
        
    </tr>
   @foreach($products as $m)
         <tr>
             <td>{{$m->id}}</td>
             <td>{{$m->name}}</td>
             <td>{{$m->description}}</td>
             <td>{{$m->price}}</td>
             <td>{{$m->quantity}}</td>
             
             
         
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
                    
                 {!!Form::open(['url'=>'admin/products/'.$m->id,'method'=>'Delete'])!!}
                  <a href="{{url('admin/products/'.$m->id.'/edit')}}" class="btn btn-success btn-xs">
                    <span class="glyphicon glyphicon-pencil"/>
                  </a>
                  {{Form::token()}}
                  <button type="submit" class="btn btn-danger btn-xs" onclick='return confirm("Are you sure to delete?")'>Delete</button>
                  <span class"glyphicon glyphicon-trash"/>
                  {!!Form::close()!!}
                </td>
         </tr>

@endforeach

</table>
@endsection

