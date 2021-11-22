<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\About;
use App\Models\Skill;
use App\Models\Framework;
use App\Models\Service;
use App\Models\Feature;
use App\Models\Porfolio;
use App\Models\Sociallink;

class ClientController extends Controller
{
    //
    public function index(){
        $sliders = Home::get();
        $abouts = About::get();
        $skills = Skill::get();
        $services = Service::get();
        $features = Feature::get();
        $frameworks = Framework::get();
        $portfolios = Porfolio::get();
        $links = Sociallink::get();
        return view('welcome')->with('sliders',$sliders)->with('abouts',$abouts)->with('skills',$skills)->with('frameworks',$frameworks)->with('services',$services)->with('frameworks',$frameworks)->with('features',$features)->with('portfolios',$portfolios)->with('links',$links);
    }
    public function projectbyid($id){
        $project = Porfolio::find($id);
        return view('projectdetails')->with('project',$project);
    }
}
