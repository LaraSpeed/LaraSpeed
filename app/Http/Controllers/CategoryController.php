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
        return view('category_show', ['categorys' => Category::paginate(20)]);
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
    * @param    Mixed
    * @return  Response
    */
    public function show(Category $category )
    {
        $category->load(array("film",));
        return view('category_display', compact('category'));        }

    /**
    * Show the form for editing the specified resource.
    *
    * @param    Mixed
    * @return  Response
    */
    public function edit(Category $category )
    {
        $category->load(array("film",));
        return view('category_edit', compact('category'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param    Mixed
    * @return  Response
    */
    public function update(Category $category )
    {
            $category->update(request()->all());

        return back();
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param    Mixed
    * @return  Response
    */
    public function destroy(Category $category )
    {
            $category->delete();
        return back();
    }

    /**
    * Load and display related tables.
    * @param    Mixed
    * @return  Response
    */
    public function related(Category $category ){
        $category->load(array("film",));
return view('category_related', compact('category'));    }

    /**
    * Search Table element By keyword
    * @return  Response
    */
    public function search(){
        $keyword = request()->get('keyword');
        $keyword = '%'.$keyword.'%';

        $categorys = Category::where('category_id', 'like', $keyword)
         ->orWhere('category_id', 'like', $keyword)

         ->orWhere('name', 'like', $keyword)

         ->orWhere('last_update', 'like', $keyword)

        ->paginate(20);
    $categorys->setPath("search?keyword=$keyword");
    return view('category_show', compact('categorys'));
    }

}

