@extends('admin.template')
@section('container')
<div class="container-fluid">
  
  <div class="row justify-content-center">
      <div class="col-lg-8">
            <div class="card">
                <div class="card-header">Update slider</div>
                <div class="card-body">
                    
                    <hr>
                    <form action="{{url('/updateslider/'.$slider->id)}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">Name</label>
                            <input id="cc-pament" name="name" value="{{$slider->name}}" type="text" class="form-control" >
                        </div>
                        <div class="form-group has-success">
                            <label for="cc-name" class="control-label mb-1">Profile1</label>
                            <input id="cc-name" name="profile1" type="text" value="{{$slider->profile1}}" class="form-control cc-name valid"
                            >
                        </div>
                        <div class="form-group">
                            <label for="cc-number" class="control-label mb-1">Profile2</label>
                            <input id="cc-number" name="profile2" type="text" value="{{$slider->profile2}}" class="form-control cc-number identified "  
                            
                                >
                        </div>
                        <div class="form-group">
                            <label for="cc-number" class="control-label mb-1">Profile3</label>
                            <input id="cc-number" name="profile3" type="text" value="{{$slider->profile3}}" class="form-control cc-number identified "  
                            
                                >
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