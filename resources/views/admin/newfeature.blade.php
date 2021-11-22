@extends('admin.template')
@section('container')
<div class="container-fluid">
  
  <div class="row justify-content-center">
      <div class="col-lg-8">
            <div class="card">
                <div class="card-header">New Feature</div>
                <div class="card-body">
                    @if (count($errors) >0)
                    <div class="alert alert-danger">
                       <ul>
                         @foreach ($errors->all() as $error)
                         
                         <li>{{$error}}</li>
                         @endforeach
                       </ul>
                       </div>
                    @endif 
                    
                    <hr>
                    <form action="{{url('/newfeature')}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">Title</label>
                            <input id="cc-pament" name="title" type="text" class="form-control" >
                        </div>
                        <div class="form-group has-success">
                            <label for="cc-name" class="control-label mb-1">Number</label>
                            <input id="cc-name" name="number" type="text" class="form-control cc-name valid"
                            >
                        </div>
                       
                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">Icon</label>
                            <input id="cc-pament" name="image" type="text" class="form-control" >
                        </div>
                       
                        <div>
                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                               Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
          
      </div>
      
  </div>


</div>
    
@endsection