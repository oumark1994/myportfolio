@extends('admin.template')
@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h2 class="title-1">About</h2>
                <a href="{{url('/addabout')}}" class="au-btn au-btn-icon au-btn--blue">
                    <i class="zmdi zmdi-plus"></i>add about</a>
            </div>
        </div>
    </div>
  <div class="row">
      <div class="col-lg-12">
          <div class="table-responsive table--no-card m-b-40">
            @if (Session::has('status'))
            <div class="alert alert-success">
              {{Session::get('status')}}
</div>
           @endif
            <table class="table table-data2">
                <thead>
                    <tr>
                        
                        <th>Image</th>
                        <th>Name</th>
                        <th>Profile</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Details</th>
                        
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($abouts as $about)

                    <tr class="tr-shadow">
                        <td>
                            <img width="35px" height="35px" src="/storage/about_images/{{$about->image}}"
                            />
                            
                        </td>
                        <td>{{$about->name}}</td>
                        <td>{{$about->profile}}</td>
                        <td>{{$about->email}}</td>
                        <td>{{$about->phone}}</td>
                        <td>{{$about->address}}</td>
                        <td>{{$about->details}}</td>
                        <td>
                            <div class="table-data-feature">
                                <a class="item" href="{{url('/editabout/'.$about->id)}}" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </a>
                                <a class="item" href="{{url('/deleteabout/'.$about->id)}}" data-toggle="tooltip" data-placement="top" title="Delete">
                                    <i class="zmdi zmdi-delete"></i>
                                </a>
                                
                            </div>
                        </td>
                    </tr>
                    <tr class="spacer"></tr>   
                    @endforeach
                  
                 
                  
                </tbody>
            </table>
          </div>
      </div>
      
  </div>
  <div class="row">
     
    
  </div>

</div>
    
@endsection