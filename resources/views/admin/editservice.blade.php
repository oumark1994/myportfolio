@extends('admin.template')
@section('container')
<div class="container-fluid">
  
  <div class="row justify-content-center">
      <div class="col-lg-8">
            <div class="card">
                <div class="card-header">Edit Service</div>
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
                    <form action="{{url('/updateservice/'.$service->id)}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">Name</label>
                            <input id="cc-pament" name="name" type="text" value="{{$service->name}}" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">Details</label>
                            <textarea name="details" id="textarea-input" rows="9"  class="form-control">{{$service->details}}</textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">Icon</label>
                            <input id="cc-pament" name="image" type="text" value="{{$service->image}}" class="form-control" >
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