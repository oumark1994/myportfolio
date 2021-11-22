@extends('admin.template')
@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h2 class="title-1">Project</h2>
                <a href="{{url('/addproject')}}" class="au-btn au-btn-icon au-btn--blue">
                    <i class="zmdi zmdi-plus"></i>add project</a>
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
                        <th>Title</th>
                        <th>Details</th>
                        <th>Category</th>
                        <th>Client</th>
                        <th>Url</th>
                        <th>Date</th>
                        
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)

                    <tr class="tr-shadow">
                        <td>
                            <img width="35px" height="35px" src="/storage/project_images/{{$project->image}}"
                            />
                            
                        </td>
                        <td>{{$project->title}}</td>
                        <td>{{$project->details}}</td>
                        <td>{{$project->category}}</td>
                        <td>{{$project->client}}</td>
                        <td>{{$project->url}}</td>
                        <td>{{$project->date}}</td>
                        <td>
                            <div class="table-data-feature">
                                <a class="item" href="{{url('/editproject/'.$project->id)}}" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </a>
                                <a class="item" href="{{url('/deleteproject/'.$project->id)}}" data-toggle="tooltip" data-placement="top" title="Delete">
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