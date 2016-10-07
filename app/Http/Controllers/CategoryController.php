<?php 
namespace App\Http\Controllers;

use App\Category;

class CategoryController extends Controller {

    /**
    * Display a listing of the resource.
    *
    * @return  Response
    */
    public function index()
    {
        return view('category_show', ['categorys' => Category::all()]);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return  Response
    */
    public function create()
    {
        return view('category');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return  Response
    */
    public function store()
    {
        $category = request()->all();
        //To Do Validate data

        //Store it
        Category::create($category);

        return back();
    }

    /**
    * Display the specified resource.
    *
    * @param    int  $id
    * @return  Response
    */
    public function show(Category $category )
    {
           $category->load(array("film",));return view('category_display', compact('category'));        }

    /**
    * Show the form for editing the specified resource.
    *
    * @param    int  $id
    * @return  Response
    */
    public function edit($id)
    {

    }

    /**
    * Update the specified resource in storage.
    *
    * @param    int  $id
    * @return  Response
    */
    public function update($id)
    {

    }

    /**
    * Remove the specified resource from storage.
    *
    * @param    int  $id
    * @return  Response
    */
    public function destroy($id)
    {
        Category::delete($id);
        return back();
    }

}

