<?php 
namespace App\Http\Controllers;

use App\Film_category;

class Film_categoryController extends Controller {

    /**
    * Display a listing of the resource.
    *
    * @return  Response
    */
    public function index()
    {
        return view('film_category_show', ['film_categorys' => Film_category::all()]);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return  Response
    */
    public function create()
    {
        return view('film_category');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return  Response
    */
    public function store()
    {
        $film_category = request()->all();
        //To Do Validate data

        //Store it
        Film_category::create($film_category);

        return back();
    }

    /**
    * Display the specified resource.
    *
    * @param    int  $id
    * @return  Response
    */
    public function show($id)
    {
        return view('film_category_display', ['film_category' => Film_category::find($id)]);
    }

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
        Film_category::delete($id);
        return back();
    }

}

