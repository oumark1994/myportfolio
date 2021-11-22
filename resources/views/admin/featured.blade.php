@extends('admin.template')
@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h2 class="title-1">Featured</h2>
                <a href="{{url('/addfeature')}}" class="au-btn au-btn-icon au-btn--blue">
                    <i class="zmdi zmdi-plus"></i>add featured</a>
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
                        
                        <th>image</th>
                        <th>Title</th>
                        <th>Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($features as $feature)

                    <tr class="tr-shadow">
                        <td>
                          {{$feature->image}}
                            
                        </td>
                        <td>{{$feature->title}}</td>
                        <td>{{$feature->number}}</td>
                        <td>
                            <div class="table-data-feature">
                                <a class="item" href="{{url('/editfeature/'.$feature->id)}}" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </a>
                                <a class="item" href="{{url('/deletefeature/'.$feature->id)}}" data-toggle="tooltip" data-placement="top" title="Delete">
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