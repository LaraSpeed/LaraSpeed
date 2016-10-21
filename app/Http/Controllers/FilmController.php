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

    /**
    * Sort Table element
    * @return  Response
    */
    public function sort(){
        $path = "";

        $films = Film::query();
        if(request()->exists('film_id')){
            $films = $films->orderBy('film_id', $this->getOrder('film_id'));
            $path = "film_id";
        }
        if(request()->exists('language_id')){
            $films = $films->orderBy('language_id', $this->getOrder('language_id'));
            $path = "language_id";
        }
        if(request()->exists('title')){
            $films = $films->orderBy('title', $this->getOrder('title'));
            $path = "title";
        }
        if(request()->exists('description')){
            $films = $films->orderBy('description', $this->getOrder('description'));
            $path = "description";
        }
        if(request()->exists('release_year')){
            $films = $films->orderBy('release_year', $this->getOrder('release_year'));
            $path = "release_year";
        }
        if(request()->exists('original_language_id')){
            $films = $films->orderBy('original_language_id', $this->getOrder('original_language_id'));
            $path = "original_language_id";
        }
        if(request()->exists('rental_duration')){
            $films = $films->orderBy('rental_duration', $this->getOrder('rental_duration'));
            $path = "rental_duration";
        }
        if(request()->exists('rental_rate')){
            $films = $films->orderBy('rental_rate', $this->getOrder('rental_rate'));
            $path = "rental_rate";
        }
        if(request()->exists('length')){
            $films = $films->orderBy('length', $this->getOrder('length'));
            $path = "length";
        }
        if(request()->exists('replacement_cost')){
            $films = $films->orderBy('replacement_cost', $this->getOrder('replacement_cost'));
            $path = "replacement_cost";
        }
        if(request()->exists('rating')){
            $films = $films->orderBy('rating', $this->getOrder('rating'));
            $path = "rating";
        }
        if(request()->exists('special_features')){
            $films = $films->orderBy('special_features', $this->getOrder('special_features'));
            $path = "special_features";
        }
        if(request()->exists('last_update')){
            $films = $films->orderBy('last_update', $this->getOrder('last_update'));
            $path = "last_update";
        }
        $films = $films->paginate(20);
        $films->setPath("sort?$path");
        return view('film_show', compact('films'));
    }

    function updateLanguage(Film $film ){
        $language = \App\Language::find(request()->get('language'));
        $film->language()->associate($language)->save();
        return back();
    }

    function addCategory(Film $film ){
        $film->category()->save(\App\Category::find(request()->get('category')));
        return back();
    }
 
    private function getOrder($param){
        if(session($param, "-1") != "-1"){
            session([$param => session($param) == 'asc' ? 'desc':'asc']);
        }else{
            session([$param => 'asc']);
        }
        return session($param);
    }



}

