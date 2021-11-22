<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use Illuminate\Support\Facades\Storage;


class SliderController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index (){
        $sliders = Home::get();
        return view('admin.home')->with('sliders',$sliders);
    }
    public function addslider(){
        return view('admin.newslider');
    }
    public function newslider(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'profile1'=>'required',
            'image'=>'image|nullable|max:1999',
            'profile2' => 'required',
            
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
            $path = $request->file('image')->storeAs('public/slider_images',$fileNameToStore);
            }else{
                $fileNameToStore = 'noimage.jpg';
            }
            $newslider = new Home();
            $newslider->name = $request->name;
            $newslider->profile1 = $request->profile1;
            $newslider->profile2 = $request->profile2;
            $newslider->profile3 = $request->profile3;
            $newslider->image = $fileNameToStore;
            $newslider->save();
            return redirect('/home')->with('status','The slider has been added successfully');

    
    }
    public function editslider($id){
        $slider = Home::find($id);
        return view('admin.updateslider')->with('slider',$slider);

    }
    public function updateslider(Request $request,$id){
        $this->validate($request,[
            'name' => 'required',
            'profile1'=>'required',
            'image'=>'image|nullable|max:1999',
            'profile2' => 'required']);
        // print($request->input('product_category'));
        $slider =  Home::find($id);
        $slider->name = $request->name;
        $slider->profile1 = $request->profile1;
        $slider->profile2 = $request->profile2;
        $newslider->profile3 = $request->profile3;

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
            $path = $request->file('image')->storeAs('public/slider_images',$fileNameToStore);
            if($slider->image != 'noimage.jpg'){
                Storage::delete('public/slider_images/'.$slider->image);
            }
            $slider->image = $fileNameToStore;

        }
        $slider->update();
        return redirect('/home')->with('status','slider '.$slider->name.' has been modified successfully ! '); }
        
    
    public function deleteslider($id){
        $slider = Home::find($id);
            if($slider->image !='noimage.jpg'){
                Storage::delete('public/slider_images/'.$slider->image);
            }
            $slider->delete();
            return redirect('/home')->with('status','The'.$slider->name.'Has been deleted successfully');

    }
}
