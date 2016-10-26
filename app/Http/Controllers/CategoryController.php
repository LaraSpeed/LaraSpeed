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
        request()->session()->forget("keyword");

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

        return redirect('/category');;
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

        session(["keyword" => $keyword]);

        $keyword = '%'.$keyword.'%';

        $categorys = Category::where('category_id', 'like', $keyword)
         ->orWhere('category_id', 'like', $keyword)

         ->orWhere('name', 'like', $keyword)

         ->orWhere('last_update', 'like', $keyword)

        ->paginate(20);
    $categorys->setPath("search?keyword=$keyword");
    return view('category_show', compact('categorys'));
    }

    /**
    * Sort Table element
    * @return  Response
    */
    public function sort(){
        $path = "";

        $categorys = Category::query();
        if(request()->exists('category_id')){
            $categorys = $categorys->orderBy('category_id', $this->getOrder('category_id'));
            $path = "category_id";
        }else{
            request()->session()->forget("category_id");
        }
        if(request()->exists('name')){
            $categorys = $categorys->orderBy('name', $this->getOrder('name'));
            $path = "name";
        }else{
            request()->session()->forget("name");
        }
        if(request()->exists('last_update')){
            $categorys = $categorys->orderBy('last_update', $this->getOrder('last_update'));
            $path = "last_update";
        }else{
            request()->session()->forget("last_update");
        }
        $categorys = $categorys->paginate(20);
        $categorys->setPath("sort?$path");
        return view('category_show', compact('categorys'));
    }

    function addFilm(Category $category ){
    $category->film()->save(\App\Film::find(request()->get('film')));
    return back();
}
 
    private function getOrder($param){
        if(session($param, "none") != "none"){
            session([$param => session($param, 'asc') == 'asc' ? 'desc':'asc']);
        }else{
            session([$param => 'asc']);
        }
        return session($param);
    }



}

