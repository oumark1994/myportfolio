@extends('admin.template')
@section('container')
<div class="container-fluid">
  
  <div class="row justify-content-center">
      <div class="col-lg-8">
            <div class="card">
                <div class="card-header">New Link</div>
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
                    <form action="{{url('/newlink')}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                        {{ csrf_field() }}
                     
                    
                        <div class="form-group">
                            <label for="cc-number" class="control-label mb-1">Facebook</label>
                            <input id="cc-number" name="facebook_link" type="text" class="form-control cc-number identified ">
                        </div>
                        <div class="form-group">
                            <label for="cc-number" class="control-label mb-1">Instagram</label>
                            <input id="cc-number" name="instagram_link" type="text" class="form-control cc-number identified ">
                        </div>
                        <div class="form-group">
                            <label for="cc-number" class="control-label mb-1">Linked</label>
                            <input id="cc-number" name="linked_link" type="text" class="form-control cc-number identified ">
                        </div>
                        <div class="form-group">
                            <label for="cc-number" class="control-label mb-1">Github</label>
                            <input id="cc-number" name="github_link" type="text" class="form-control cc-number identified ">
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