<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Multipic;
use App\Models\Slider;
use App\Models\HomeAbout;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        $sliders = Slider::all();
        $about = HomeAbout::all()->first();
        $images = Multipic::all();

        return view('home', compact('brands','sliders','about','images'));
    }

    public function homeSlider()
    {
        $sliders = Slider::latest()->paginate();
        return view('admin.slider.index', compact('sliders'));
    }
    public function addSlider()
    {
        return view('admin.slider.addslider');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSlider(Request $request)
    {
        $slider_image = $request->file('image');
        $nam_gen = rand() . '.' . $slider_image->getClientOriginalExtension();
        Image::make($slider_image)->resize(1920, 1080)->save('Images/slider/' . $nam_gen);
        $last_img = 'Images/slider/' . $nam_gen;

        $slider = new Slider();
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->image = $last_img;
        $slider->save();
        return redirect()->route('home.slider')->with('success', 'Slider Inserted Successfully ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sliderEdit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sliderUpdate(Request $request, $id)
    {
        $old_img = $request->old_img;
        $slider_images = $request->file('image');
        if ($slider_images) {
            $nam_gen = rand() . '.' . $slider_images->getClientOriginalExtension();
            Image::make($slider_images)->resize(1920, 1080)->save('Images/slider/' . $nam_gen);
            $last_img = 'Images/slider/' . $nam_gen;
            unlink($old_img);

            $slider = Slider::find($id);
            $slider->title = $request->title;
            $slider->description = $request->description;
            $slider->image = $last_img;
            $slider->update();

            return redirect()->route('home.slider')->with('success', 'Slider Updated Successfully');
        }
        else {
            $slider = Slider::find($id);
            $slider->title = $request->title;
            $slider->description = $request->description;
            $slider->update();

            return redirect()->route('home.slider')->with('success', 'Slider Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sliderDelete($id)
    {
        $img=Slider::find($id);
        $old_img=$img->image;
        unlink($old_img);
       $delete=Slider::find($id)->delete();
       return redirect()->back()->with('success','Slider Deleted Successfully');

    }
}
