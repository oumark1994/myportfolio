<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;
class ServiceController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index (){
        $services = Service::get();
        return view('admin.services')->with('services',$services);
    }
    public function addservice(){
        return view('admin.newservice');
     
    }
    public function newservice(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'details'=>'required',
            'image'=>'required',
            ]);
                //1:get file name with ext
      
            $newservice = new Service();
            $newservice->name = $request->name;
            $newservice->details = $request->details;
            $newservice->image = $request->image;
            $newservice->save();
            return redirect('/service')->with('status','The service has been added successfully');        
     
    }
    public function editservice($id){
        $service = Service::find($id);
        return view('admin.editservice')->with('service',$service);

    }
    public function updateservice(Request $request,$id){
        $this->validate($request,[
            'name' => 'required',
            'details'=>'required',
            'image'=>'required',
            ]);
        // print($request->input('product_category'));
        $service =  Service::find($id);
        $service->name = $request->name;
        $service->details = $request->details;
        $service->image = $request->image;
        $service->update();


        return redirect('/service')->with('status','Service '.$service->name.' has been modified successfully ! ');
        
    }
    public function deleteservice($id){
        $service = Service::find($id);
            if($service->image !='noimage.jpg'){
                Storage::delete('public/service_images/'.$service->image);
            }
            $service->delete();
            return redirect('/service')->with('status','The' .$service->name. ' Has been deleted successfully');
    }
}
