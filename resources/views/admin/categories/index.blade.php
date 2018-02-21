@extends('admin.shared.layout')
@section('title','Category')
@section('content')
<div class="page-header">

    <h1>Category</h1>


<!------ Include the above in your HEAD tag ---------->

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="{{url('admin/products')}}"><img id="header-image">Product</a>         
  </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <div class="menu-bar"></div>
                <div class="menu-bar"></div>
                <div class="menu-bar"></div>
              </a>
              <ul class="dropdown-menu" id="number-list">
              <ul class="list-inline lefties">
            <li class="active lefties-item"><a href="index.html">Home</a></li>
            <li class="lefties-item"><a href="blog.html">Blog</a></li>
            <li class="lefties-item"><a href="gallery.html">Gallery</a></li>
            <li class="lefties-item"><a href="about.html">About</a></li>								
            <li class="lefties-item"><a href="contact.html">Contact</a></li>
            </ul>
        </ul>
        </li>
        </ul>
        </div>
    
</nav>
    <div class="row">
    <div class="col-xs-7 col-sm-6 col-lg-8">
        <form action="{{url('admin\categories')}}">
            <input type="text" name="q" placeholder="search.........."/>
            <a href="{{url('admin\categories')}}" class="btn btn-danger btn-xs">
                Clear
            </a>
            {{csrf_field()}}
        </form>
    </div>
</div>
<div class="pull-right">
    <p>
    <a href="{{url('admin/categories/create')}}" class="btn btn-primary btn-xs">
    <span class="glyphicon glyphicon-plus"/>
    </a>
</p>
</div>
<table class="table">
    <tr>
        <th>Id</th>
        <th>Name</th>
        
        <th>Image</th>
        <th>AddedDate</th>
        <th>ModifiedDate</th>
        <th>Status</th>
        <th>Action</th>
        <th>
    </tr>
   @foreach($categories as $m)
         <tr>
             <td>{{$m->id}}</td>
             <td>{{$m->name}}<a class="detail-view-btn btn btn-default btn-xs" data-title="{{$m->name}}">Detail</a>
                <div class="detail-description" style="display:none">{{$m->description}}</div>
             </td>

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
                    
                 {!!Form::open(['url'=>'admin/categories/'.$m->id,'method'=>'Delete'])!!}
                  <a href="{{url('admin/categories/'.$m->id.'/edit')}}" class="btn btn-success btn-xs">
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

<div class="modal fade" id="detail-dialog" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Modal title</h4>
        </div>
        <div class="modal-body">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

  <script>
      $(function(){
          $(".detail-view-btn").on('click',function(){
            $this=$(this);
            $("#detail-dialog .modal-title").html($this.attr('data-title'));
             $content=$this.parent().find('.detail-description').html();
             $("#detail-dialog .modal-body").html($content);           
              $("#detail-dialog").modal();

          });

      });
    </script>
@endsection
 
