<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index (){
        $skills = Skill::get();
        return view('admin.skills')->with('skills',$skills);
    }
    public function addskill(){
        return view('admin.newskill');
     
    }
    public function newskill(Request $request){
        
        $this->validate($request,['name'=>'required','percentage'=>'required']);
        $newskill = new Skill();
        $newskill->name = $request->input('name');
        $newskill->percentage = $request->input('percentage');
        $newskill->save();
        return redirect('/skills')->with('status','The skill has been added successfully');

     
    }
    public function editskill($id){
        $skill = Skill::find($id);
        return view('admin.editskill')->with('skill',$skill);

    }
    public function updateskill(Request $request,$id){
        $skill = Skill::find($id);
        $skill->name = $request->input('name');
        $skill->percentage = $request->input('percentage');
        $skill->update();
        return redirect('/skills')->with('status','The skill has been updated successfully');
        
    }
    public function deleteskill($id){
        $skill = Skill::find($id);
        $skill->delete();
        return redirect('/skills')->with('status','Skill has been deleted successfully');


    }
}
