<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Porfolio;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index (){
        $projects = Porfolio::get();
        return view('admin.portfolios')->with('projects',$projects);
    }
    public function addproject(){
        $services = Service::All()->pluck('name','name');
        return view('admin.newproject')->with('services',$services);

    }
    public function newproject(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'category'=>'required',
            'date'=>'required',
            'details'=>'required',
            'client'=>'required',
            'url'=>'required',
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
            $path = $request->file('image')->storeAs('public/project_images',$fileNameToStore);
            }else{
                $fileNameToStore = 'noimage.jpg';
            }
            $newproject = new Porfolio();
            $newproject->title = $request->title;
            $newproject->category = $request->category;
            $newproject->date = $request->date;
            $newproject->details = $request->details;
            $newproject->client = $request->client;
            $newproject->url = $request->url;
            $newproject->image = $fileNameToStore;
            $newproject->save();
            return redirect('/project')->with('status','The project has been added successfully'); 
     
    }
    public function editproject($id){
        $project = Porfolio::find($id);
        return view('admin.editproject')->with('project',$project);

    }
    public function updateproject(Request $request,$id){
        $this->validate($request,[
            'title' => 'required',
            'category'=>'required',
            'date'=>'required',
            'details'=>'required',
            'client'=>'required',
            'url'=>'required',
            'image'=>'image|nullable|max:1999',
            ]);
        // print($request->input('product_category'));
            $project =  Porfolio::find($id);
            $project->title = $request->title;
            $project->category = $request->category;
            $project->date = $request->date;
            $project->details = $request->details;
            $project->client = $request->client;
            $project->url = $request->url;

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
            $path = $request->file('image')->storeAs('public/project_images',$fileNameToStore);
            if($project->image != 'noimage.jpg'){
                Storage::delete('public/project_images/'.$project->image);
            }
            $project->image = $fileNameToStore;

        }
        $project->update();
        return redirect('/project')->with('status','Project '.$project->title.' has been modified successfully ! ');
        
        
    }
    public function deleteproject($id){
        $project = Porfolio::find($id);
        if($project->image !='noimage.jpg'){
            Storage::delete('public/project_images/'.$project->image);
        }
        $project->delete();
        return redirect('/project')->with('status','The ' .$project->title. ' Has been deleted successfully');
}
    
}
