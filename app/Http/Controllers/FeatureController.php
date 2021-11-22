<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feature;
use Illuminate\Support\Facades\Storage;

class FeatureController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index (){
        $features = Feature::get();
        return view('admin.featured')->with('features',$features);
    }
    public function addfeature(){

        return view('admin.newfeature');
     
    }
    public function newfeature(Request $request){
        
        $this->validate($request,[
            'title' => 'required',
            'number'=>'required',
            'image'=>'required',
            ]);
       
            $newfeature = new Feature();
            $newfeature->title = $request->title;
            $newfeature->number = $request->number;
            $newfeature->image =$request->image;
            $newfeature->save();
            return redirect('/features')->with('status','The features has been added successfully');     
     
    }


    public function editfeature($id){
        $feature = Feature::find($id);
        return view('admin.editfeature')->with('feature',$feature);

    }
    public function updatefeature(Request $request,$id){
        $this->validate($request,[
            'title' => 'required',
            'number'=>'required',
            'image'=>'required',
            ]);
        // print($request->input('product_category'));
        $feature =  Feature::find($id);
        $feature->title = $request->title;
        $feature->number = $request->number;
        $feature->image = $request->image;


        $feature->update();
        return redirect('/features')->with('status','Features '.$feature->title.' has been modified successfully ! ');
        
    }
    public function deletefeature($id){
        $feature = Feature::find($id);
        if($feature->image !='noimage.jpg'){
            Storage::delete('public/feature_images/'.$feature->image);
        }
        $feature->delete();
        return redirect('/features')->with('status','The' .$feature->title. ' Has been deleted successfully');
}
    
}
