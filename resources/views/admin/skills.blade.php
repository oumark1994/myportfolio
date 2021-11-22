@extends('admin.template')
@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h2 class="title-1">Skill</h2>
                <a href="{{url('/addskill')}}" class="au-btn au-btn-icon au-btn--blue">
                    <i class="zmdi zmdi-plus"></i>add Skill</a>
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
                    @foreach ($skills as $skill)
                    <tr class="tr-shadow">
                        <td>{{$skill->id}}</td>
                        <td>{{$skill->name}}</td>
                        <td>{{$skill->percentage}}</td>
                        <td>
                            <div class="table-data-feature">
                                <a class="item" href="{{url('/editskill/'.$skill->id)}}" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </a>
                                <a class="item" href="{{url('/deleteskill/'.$skill->id)}}" data-toggle="tooltip" data-placement="top" title="Delete">
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