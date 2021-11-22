@extends('admin.template')
@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h2 class="title-1">Social Links</h2>
                <a href="{{url('/addlink')}}" class="au-btn au-btn-icon au-btn--blue">
                    <i class="zmdi zmdi-plus"></i>add link</a>
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
                        
                        <th>Facebook</th>
                        <th>Instagram</th>
                        <th>Github</th>
                        <th>Linked</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($links as $link)

                    <tr class="tr-shadow">
                       
                        <td>{{$link->facebook_link}}</td>
                        <td>{{$link->instagram_link}}</td>
                        <td>{{$link->github_link}}</td>
                        <td>{{$link->linked_link}}</td>
                        <td>
                            <div class="table-data-feature">
                                <a class="item" href="{{url('/editlink/'.$link->id)}}" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </a>
                                <a class="item" href="{{url('/deletelink/'.$link->id)}}" data-toggle="tooltip" data-placement="top" title="Delete">
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