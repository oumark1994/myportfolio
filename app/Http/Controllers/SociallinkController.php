<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sociallink;

class SociallinkController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index (){
        $links = Sociallink::get();
        return view('admin.sociallinks')->with('links',$links);
    }
    public function addlink(){
        return view('admin.newlink');
     
    }
    public function newlink(Request $request){
        $this->validate($request,['facebook_link'=>'required','instagram_link'=>'required','github_link'=>'required','linked_link'=>'required']);
        $newlink = new Sociallink();
        $newlink->facebook_link = $request->input('facebook_link');
        $newlink->instagram_link = $request->input('instagram_link');
        $newlink->github_link = $request->input('github_link');
        $newlink->linked_link = $request->input('linked_link');
        $newlink->save();
        return redirect('/sociallinks')->with('status','The links has been added successfully');
        
     
    }
    public function editlink($id){
        $link = Sociallink::find($id);
        return view('admin.editlink')->with('link',$link);

    }
    public function updatelink(Request $request,$id){
        $link = Sociallink::find($id);
        $link->facebook_link = $request->input('facebook_link');
        $link->instagram_link = $request->input('instagram_link');
        $link->github_link = $request->input('github_link');
        $link->linked_link = $request->input('linked_link');
        $link->save();
        return redirect('/sociallinks')->with('status','The links has been updated successfully');
        
    }
    public function deletelink($id){
        $link = Sociallink::find($id);
        $link->delete();
        return redirect('/sociallinks')->with('status','Link has been deleted successfully');
    }
}
