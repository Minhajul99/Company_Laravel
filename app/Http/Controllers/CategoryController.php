<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        // $categories = Category::all();
        // $categories = Category::latest()->get(); // For Showing The Latest Data.
        $categories = Category::latest()->paginate(5); // For Showing The Latest Data.
        $trashCats = Category::onlyTrashed()->latest()->paginate(3); // For Showing The Trash Data.
        return view('admin.category.allcategory',compact('categories','trashCats'));
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
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ]);

        // Category::insert([
        //     'category_name'=> $request->category_name,
        //     'user_id'=> Auth::User()->id,
        //     'created_at'=> Carbon::now(),
        // ]);

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->user_id = Auth::User()->id;
        $category->save();
        return redirect()->back()->with('success','Category Added Successfully');
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
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.editcategory',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $upcat = Category::find($id);
        $upcat->category_name=$request->category_name;
        $upcat->update();
        return redirect()->route('category')->with('success','Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function softdeletes ($id)
    {
        $delete= Category::find($id);
        $delete->delete();
        return redirect()->back()->with('success','Category deleted');
    }
    public function restore($id){
        $restore= Category::withTrashed()->find($id)->restore();
        return redirect()->back()->with('success','Restore Successfully');
    }
    public function delete($id){
        $delete= Category::onlyTrashed()->find($id)->forceDelete();
        return redirect()->back()->with('success','Category deleted Parmanently');
    }
}
