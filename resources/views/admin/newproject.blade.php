@extends('admin.template')
@section('container')
<div class="container-fluid">
  
  <div class="row justify-content-center">
      <div class="col-lg-8">
            <div class="card">
                <div class="card-header">New Project</div>
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
                    <form action="{{url('/newproject')}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">Title</label>
                            <input id="cc-pament" name="title" type="text" class="form-control" >
                        </div>
                        <div class="form-group has-success">
                            {{Form::label('','Category')}}
                            {{Form::select('category',$services,null,['placeholder'=>'Select category','class'=>'form-control'])}}
                        </div>
                        <div class="form-group">
                            <label for="cc-number" class="control-label mb-1">Date</label>
                            <input id="cc-number" name="date" type="date" class="form-control cc-number identified "  
                             >
                        </div>
                        <div class="form-group">
                            <textarea name="details" id="textarea-input" rows="9" placeholder="Enter details" class="form-control"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="cc-number" class="control-label mb-1">Client</label>
                            <input id="cc-number" name="client" type="text" class="form-control cc-number identified "  
                             >
                        </div>
                        <div class="form-group">
                            <label for="cc-number" class="control-label mb-1">Image</label>
                            <input id="cc-number" name="image" type="file" class="form-control cc-number identified "  
                            
                                >
                        </div>
                        <div class="form-group">
                            <label for="cc-number" class="control-label mb-1">Url</label>
                            <input id="cc-number" name="url" type="text" class="form-control cc-number identified "  
                            
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