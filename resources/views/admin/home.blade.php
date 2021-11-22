@extends('admin.template')
@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
           
            <div class="overview-wrap">
                <h2 class="title-1">Home</h2>
                <a href="{{url('/addslider')}}" class="au-btn au-btn-icon au-btn--blue">
                    <i class="zmdi zmdi-plus"></i>add slider</a>
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
                        <th>Profile1</th>
                        <th>Profile2</th>
                        <th>Profile3</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sliders as $slider)

                    <tr class="tr-shadow">
                        <td>
                            <img width="35px" height="35px" src="/storage/slider_images/{{$slider->image}}"
                            />
                            
                        </td>
                        <td>{{$slider->name}}</td>
                        <td>{{$slider->profile1}}</td>
                        <td>{{$slider->profile2}}</td>
                        <td>{{$slider->profile3}}</td>
                        <td>
                            <div class="table-data-feature">
                                <a class="item" href="{{url('/editslider/'.$slider->id)}}" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </a>
                                <a class="item" href="{{url('/deleteslider/'.$slider->id)}}" data-toggle="tooltip" data-placement="top" title="Delete">
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