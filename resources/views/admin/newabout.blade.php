@extends('admin.template')
@section('container')
<div class="container-fluid">
  
  <div class="row justify-content-center">
      <div class="col-lg-8">
            <div class="card">
                <div class="card-header">New About</div>
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
                    <form action="{{url('/newabout')}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">Name</label>
                            <input id="cc-pament" name="name" type="text" class="form-control" >
                        </div>
                     
                        <div class="form-group">
                            <label for="cc-number" class="control-label mb-1">Profile</label>
                            <input id="cc-number" name="profile" type="text" class="form-control cc-number identified "  
                             >
                        </div>
                        <div class="form-group">
                            <label for="cc-number" class="control-label mb-1">Email</label>
                            <input id="cc-number" name="email" type="text" class="form-control cc-number identified "  
                             >
                        </div>
                        <div class="form-group">
                            <label for="cc-number" class="control-label mb-1">Phone</label>
                            <input id="cc-number" name="phone" type="number" class="form-control cc-number identified "  
                             >
                        </div>
                        <div class="form-group">
                            <label for="cc-number" class="control-label mb-1">Address</label>
                            <input id="cc-number" name="address" type="text" class="form-control cc-number identified "  
                             >
                        </div>
                        <div class="form-group">
                            <textarea name="details" id="textarea-input" rows="9" placeholder="Enter details" class="form-control"></textarea>
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="cc-number" class="control-label mb-1">Image</label>
                            <input id="cc-number" name="image" type="file" class="form-control cc-number identified "  
                            
                                >
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