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
        return view('film_show', ['films' => Film::paginate(20)]);
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
    * @param    Mixed
    * @return  Response
    */
    public function update(Film $film )
    {
            $film->update(request()->all());

        return back();
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param    Mixed
    * @return  Response
    */
    public function destroy(Film $film )
    {
            $film->delete();
        return back();
    }

    /**
    * Load and display related tables.
    * @param    Mixed
    * @return  Response
    */
    public function related(Film $film ){
        $film->load(array("language","category",));
return view('film_related', compact('film'));    }

    /**
    * Search Table element By keyword
    * @return  Response
    */
    public function search(){
        $keyword = request()->get('keyword');
        $keyword = '%'.$keyword.'%';

        $films = Film::where('film_id', 'like', $keyword)
         ->orWhere('film_id', 'like', $keyword)

         ->orWhere('language_id', 'like', $keyword)

         ->orWhere('title', 'like', $keyword)

         ->orWhere('description', 'like', $keyword)

         ->orWhere('release_year', 'like', $keyword)

         ->orWhere('original_language_id', 'like', $keyword)

         ->orWhere('rental_duration', 'like', $keyword)

         ->orWhere('rental_rate', 'like', $keyword)

         ->orWhere('length', 'like', $keyword)

         ->orWhere('replacement_cost', 'like', $keyword)

         ->orWhere('rating', 'like', $keyword)

         ->orWhere('special_features', 'like', $keyword)

         ->orWhere('last_update', 'like', $keyword)

        ->paginate(20);
    $films->setPath("search?keyword=$keyword");
    return view('film_show', compact('films'));
    }

}

