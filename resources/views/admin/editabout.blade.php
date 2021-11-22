@extends('admin.template')
@section('container')
<div class="container-fluid">
  
  <div class="row justify-content-center">
      <div class="col-lg-8">
            <div class="card">
                @if (count($errors) >0)
                <div class="alert alert-danger">
                   <ul>
                     @foreach ($errors->all() as $error)
                     
                     <li>{{$error}}</li>
                     @endforeach
                   </ul>
                   </div>
                @endif 
                <div class="card-header">Update About</div>
                <div class="card-body">
                    
                    <hr>
                    <form action="{{url('/updateabout/'.$about->id)}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">Name</label>
                            <input id="cc-pament" name="name" value="{{$about->name}}" type="text" class="form-control" >
                        </div>
                     
                        <div class="form-group">
                            <label for="cc-number" class="control-label mb-1">Profile</label>
                            <input id="cc-number" name="profile" type="text" value="{{$about->profile}}"  class="form-control cc-number identified "  
                             >
                        </div>
                        <div class="form-group">
                            <label for="cc-number" class="control-label mb-1">Email</label>
                            <input id="cc-number" name="email" type="text" value="{{$about->email}}"  class="form-control cc-number identified "  
                             >
                        </div>
                        <div class="form-group">
                            <label for="cc-number" class="control-label mb-1">Phone</label>
                            <input id="cc-number" name="phone" type="text" value="{{$about->phone}}"   class="form-control cc-number identified "  
                             >
                        </div>
                        <div class="form-group">
                            <label for="cc-number" class="control-label mb-1">Address</label>
                            <input id="cc-number" name="address" type="text" value="{{$about->address}}"  class="form-control cc-number identified "  
                             >
                        </div>
                        <div class="form-group">
                            <textarea name="details" id="textarea-input" rows="9"  class="form-control">{{$about->details}}</textarea>
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