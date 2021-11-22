@extends('admin.template')
@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h2 class="title-1">Frameworks</h2>
                <a href="{{url('/addframework')}}" class="au-btn au-btn-icon au-btn--blue">
                    <i class="zmdi zmdi-plus"></i>add Framework</a>
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
                        <th>#</th>
                        <th>Name</th>
                        <th>Percentage</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($frameworks as $framework)
                    <tr class="tr-shadow">
                        <td>{{$framework->id}}</td>
                        <td>{{$framework->name}}</td>
                        <td>{{$framework->percentage}}</td>
                        <td>
                            <div class="table-data-feature">
                                <a class="item" href="{{url('/editframework/'.$framework->id)}}" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </a>
                                <a class="item" href="{{url('/deleteframework/'.$framework->id)}}" data-toggle="tooltip" data-placement="top" title="Delete">
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