<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Facades\Storage;
class AboutController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index (){
        $abouts = About::get();
        return view('admin.about')->with('abouts',$abouts);
    }
    public function addabout(){
        return view('admin.newabout');
     
    }
    public function newabout(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'profile'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'details'=>'required',
            'image'=>'image|nullable|max:1999',
            ]);
            if($request->hasFile('image')){
                //1:get file name with ext
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            //2:get just file name
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //GET JUST FILE EXTENSION
            $extention = $request->file('image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore  = $fileName.'_'.time().'.'.$extention;

            //uploader l'image
            $path = $request->file('image')->storeAs('public/about_images',$fileNameToStore);
            }else{
                $fileNameToStore = 'noimage.jpg';
            }
            $newabout = new About();
            $newabout->name = $request->name;
            $newabout->profile = $request->profile;
            $newabout->email = $request->email;
            $newabout->details = $request->details;
            $newabout->phone = $request->phone;
            $newabout->address = $request->address;
            $newabout->image = $fileNameToStore;
            $newabout->save();
            return redirect('/about')->with('status','Your data has been inserted successfully'); 
     
    }
    public function editabout($id){
        $about = About::find($id);
        return view('admin.editabout')->with('about',$about);

    }
    public function updateabout(Request $request,$id){
        $this->validate($request,[
            'name' => 'required',
            'profile'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'details'=>'required',
            'image'=>'image|nullable|max:1999',
            ]);
            $about =  About::find($id);
            $about->name = $request->name;
            $about->profile = $request->profile;
            $about->email = $request->email;
            $about->details = $request->details;
            $about->phone = $request->phone;
            $about->address = $request->address;

        if($request->hasFile('image')){
            //1:get file name with ext
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            //2:get just file name
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //GET JUST FILE EXTENSION
            $extention = $request->file('image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore  = $fileName.'_'.time().'.'.$extention;

            //uploader l'image
            $path = $request->file('image')->storeAs('public/about_images',$fileNameToStore);
            if($project->image != 'noimage.jpg'){
                Storage::delete('public/about_images/'.$about->image);
            }
            $about->image = $fileNameToStore;

        }
        $about->update();
        return redirect('/about')->with('status','Your details has been modified successfully ! ');
        

        
    }
    public function deleteabout($id){
        $about = About::find($id);
        if($about->image !='noimage.jpg'){
            Storage::delete('public/about_images/'.$about->image);
        }
        $about->delete();
        return redirect('/about')->with('status','Your details has been deleted successfully');
    }
}
