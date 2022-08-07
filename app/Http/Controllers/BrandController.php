<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Multipic;
use Illuminate\Support\Carbon;
use Spatie\Backtrace\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    // LogOut
    public function Logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'You Are Loged Out!!');
    }

    public function index()
    {
        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.index', compact('brands'));
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
    public function store(Request $request)
    {
        // <!-- Manual System Of Image Insert --->
        // $validator=$request->validate([
        //     'brand_name'=> 'required|unique:brands|min:2',
        //     'brand_image'=>'required|mimes:png,jpg,jpeg'
        // ]);

        // $brand_images = $request->file('brand_image');
        // $nam_gen = hexdec(uniqid());
        // $img_ext = strtolower($brand_images->getClientOriginalExtension());
        // $img_name = $nam_gen.'.'. $img_ext;
        // $img_location = 'Images/brand/';
        // $last_img = $img_location.$img_name;
        // $brand_images->move($img_location,$img_name);

        // $brand = new Brand();
        // $brand->brand_name = $request->brand_name;
        // $brand->brand_image =$last_img;
        // $brand->save();
        // // Brand::insert([
        // //     'brand_name'=>$request->brand_name,
        // //     'brand_image'=> $last_img,
        // //     'created_at'=>Carbon::now()

        // // ]);
        // return redirect('brand')->with('success','Brand Added Successfully');

        // Image Intervention

        $validator = $request->validate([
            'brand_name' => 'required|unique:brands|min:2',
            'brand_image' => 'required|mimes:png,jpg,jpeg'
        ]);

        $brand_images = $request->file('brand_image');
        $nam_gen = rand() . '.' . $brand_images->getClientOriginalExtension();
        Image::make($brand_images)->resize(600, 700)->save('Images/brand/' . $nam_gen);
        $last_img = 'Images/brand/' . $nam_gen;

        $brand = new Brand();
        $brand->brand_name = $request->brand_name;
        $brand->brand_image = $last_img;
        $brand->save();

        $alert = array(
            'message' => 'Brand Added Successfully' ,
            'alert-type' =>'success',
        );
        return redirect()->route('brand')->with($alert);
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
    public function brandEdit($id)
    {
        $brands = Brand::find($id);
        return view('admin.brand.editbrand', compact('brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function brandUpdate(Request $request, $id)
    {

        $old_img = $request->old_img;
        $brand_images = $request->file('brand_image');
        if ($brand_images) {
            $nam_gen = hexdec(uniqid());
            $img_ext = strtolower($brand_images->getClientOriginalExtension());
            $img_name = $nam_gen . '.' . $img_ext;
            $img_location = 'Images/brand/';
            $last_img = $img_location . $img_name;
            $brand_images->move($img_location, $img_name);
            unlink($old_img);

            $brand = Brand::find($id);
            $brand->brand_name = $request->brand_name;
            $brand->brand_image = $last_img;
            $brand->update();

            // Toaster
            $alert = array(
                'message' => 'Brand Updated Successfully' ,
                'alert-type' =>'info',
            );
            // Extra Way....
            // Brand::insert([
            //     'brand_name'=>$request->brand_name,
            //     'brand_image'=> $last_img,
            //     'created_at'=>Carbon::now()

            // ]);
            return redirect()->route('brand')->with($alert);
        } else {
            $brand = Brand::find($id);
            $brand->brand_name = $request->brand_name;
            $brand->update();

             // Toaster
             $alert = array(
                'message' => 'Brand Updated Successfully' ,
                'alert-type' =>'info',
            );

            return redirect()->route('brand')->with($alert);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function brandDelete($id)
    {
        $img = Brand::find($id);
        $old_img = $img->brand_image;
        unlink($old_img);
        $delete = Brand::find($id)->delete();

         // Toaster
         $alert = array(
            'message' => 'Brand Deleted Successfully' ,
            'alert-type' =>'error',
        );
        return redirect()->back()->with($alert);
    }

    // Multiple Image Part
    public function multipic()
    {
        $images = Multipic::all();
        return view('admin.multipic.index', compact('images'));
    }
    public function storeImg(Request $request)
    {

        $validator = $request->validate([
            'multipic' => 'required|mimes:png,jpg,jpeg'
        ]);

        $multi_pics = $request->file('multipic');

        foreach ($multi_pics as $multi_pic) {
            $nam_gen2 = rand() . '.' . $multi_pic->getClientOriginalExtension();
            Image::make($multi_pic)->resize(300, 400)->save('Images/multi/' . $nam_gen2);
            $last_img2 = 'Images/multi/' . $nam_gen2;

            $multi = new Multipic();
            $multi->multi_pic = $last_img2;
            $multi->save();
        }


        return redirect()->back()->with('success', 'Images Added Successfully');
    }
}
