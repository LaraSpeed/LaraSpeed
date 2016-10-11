<?php 
namespace App\Http\Controllers;

use App\Film;

class FilmController extends Controller {

    /**
    * Display a listing of the resource.
    *
    * @return  Response
    */
    public function index()
    {
        return view('film_show', ['films' => Film::all()]);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return  Response
    */
    public function create()
    {
        return view('film');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return  Response
    */
    public function store()
    {
        $film = request()->all();
        //To Do Validate data

        //Store it
        Film::create($film);

        return back();
    }

    /**
    * Display the specified resource.
    *
    * @param    Mixed
    * @return  Response
    */
    public function show(Film $film )
    {
        $film->load(array("language","category",));
        return view('film_display', compact('film'));        }

    /**
    * Show the form for editing the specified resource.
    *
    * @param    Mixed
    * @return  Response
    */
    public function edit(Film $film )
    {
        $film->load(array("language","category",));
        return view('film_edit', compact('film'));
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
        Film::delete($id);
        return back();
    }

}

