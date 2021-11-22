<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Framework;

class FrameworkController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index (){
        $frameworks = Framework::get();
        return view('admin.frameworks')->with('frameworks',$frameworks);
    }
    public function addframework(){
        return view('admin.newframework');
     
    }
    public function newframework(Request $request){
        
        $this->validate($request,['name'=>'required','percentage'=>'required']);
        $newframework = new Framework();
        $newframework->name = $request->input('name');
        $newframework->percentage = $request->input('percentage');
        $newframework->save();
        return redirect('/frameworks')->with('status','The framework has been added successfully');

     
    }
    public function editframework($id){
        $framework = Framework::find($id);
        return view('admin.editframework')->with('framework',$framework);

    }
    public function updateframework(Request $request,$id){
        $framework = Framework::find($id);
        $framework->name = $request->input('name');
        $framework->percentage = $request->input('percentage');
        $framework->update();
        return redirect('/frameworks')->with('status','The framework has been updated successfully');
        
    }
    public function deleteframework($id){
        $framework = Framework::find($id);
        $framework->delete();
        return redirect('/frameworks')->with('status','framework has been deleted successfully');


    }
}
