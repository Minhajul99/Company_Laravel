<?php

namespace App\Http\Controllers;
use App\Models\HomeAbout;
use App\Models\Multipic;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function homeAbout()
    {
       $abouts = HomeAbout::latest()->get();
       return view('admin.about.about',compact('abouts'));

    }



     public function addAbout()
     {
        return view('admin.about.addAbout');
     }

    public function storeAbout(Request $request)
    {

        $abouts = new HomeAbout();
        $abouts->title = $request->title;
        $abouts->short_des = $request->short_des;
        $abouts->long_des = $request->long_des;
        $abouts->save();
        return redirect()->route('home.about')->with('success', 'About Inserted Successfully ');
    }


    public function editAbout($id)
    {
        $abouts = HomeAbout::find($id);
        return view('admin.about.editAbout',compact('abouts'));
    }


    public function updateAbout(Request $request, $id)
    {
        $abouts = HomeAbout::find($id);
        $abouts->title= $request->title;
        $abouts->short_des = $request->short_des;
        $abouts->long_des = $request->long_des;
        $abouts->update();
        return redirect()->route('home.about')->with('success', 'About Info Updated Successfully');

    }


    public function deleteAbout($id)
    {
       $delete=HomeAbout::find($id)->delete();
        return redirect()->back()->with('success','About Info Deleted Successfully');
    }

    // ********** Portfolio Part *******

    public function portfolio()
    {
        $images = Multipic::all();
        return view('pages.portfolio',compact('images'));
    }
}
