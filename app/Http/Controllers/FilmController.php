<?php 
namespace App\Http\Controllers;

use App\Film;
    use App\Director;

     
class FilmController extends Controller {

    /**
    * Display a listing of the resource.
    *
    * @return  Response
    */
    public function index()
    {
        request()->session()->forget("keyword");
        request()->session()->forget("clear");
        request()->session()->forget("defaultSelect");
        session(["mutate" => '1']);
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
        $data = request()->all();

        $film = Film::create([
             "title" => $data["title"],
                 "description" => $data["description"],
                 "price" => $data["price"],
          "famous" => ($data["famous"] == 'on' ? 1:0),      ]);

        if(request()->exists('director')){
            $director = Director::find(request()->get('director'));
            $film->director()->associate($director)->save();
         }

      
        return redirect('/film');    }

    /**
    * Display the specified resource.
    *
    * @param    Mixed
    * @return  Response
    */
    public function show(Film $film )
    {
        request()->session()->forget("mutate");
        $film->load(array("director",));
return view('film_display', compact('film'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param    Mixed
    * @return  Response
    */
    public function edit(Film $film )
    {
        request()->session()->forget("mutate");
        $film->load(array("director",));
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
            $data = request()->all();

    $updateFields = array();
             $updateFields["title"] = $data["title"];
             $updateFields["description"] = $data["description"];
             $updateFields["price"] = $data["price"];
             $updateFields["famous"] = $data["famous"];
     
    $film->update($updateFields);

            if(request()->exists('director')){
            $director = \App\Director::find(request()->get('director'));
            $film->director()->associate($director)->save();
        }

      



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
        $film->delete();         return back();
    }

    /**
    * Load and display related tables.
    * @param    Mixed
    * @return  Response
    */
    public function related(Film $film ){

        session(["mutate" => '1']);
        if(request()->exists('cs')){
            request()->session()->forget("keyword");
            return back();
        }

        if(request()->exists('tab') && session("clear", "none") != request()->get('tab')){
            request()->session()->forget("keyword");
            session(["clear" => request()->get('tab')]);
        }

        $table = request()->get('tab');
        $film->load(array("director",));
        return view('film_related', compact(['film', 'table']));
    }

    /**
    * Search Table element By keyword
    * @return  Response
    */
    public function search(){
        $keyword = request()->get('keyword');

        if(request()->exists('tab')){
            session(['keyword' => $keyword]);
            return back();
        }

        session(["keyword" => $keyword]);

        $keyword = '%'.$keyword.'%';

        $films = Film::where('id', 'like', $keyword)
         ->orWhere('id', 'like', $keyword)

         ->orWhere('title', 'like', $keyword)

         ->orWhere('description', 'like', $keyword)

         ->orWhere('price', 'like', $keyword)

         ->orWhere('famous', 'like', $keyword)

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

        request()->session()->forget("sortKey");
        request()->session()->forget("sortOrder");
    if(!request()->exists('tab')){
        $films = Film::query();
        if(request()->exists('title')){
            $films = $films->orderBy('title', $this->getOrder('title'));
            $path = "title";
        }else{
            request()->session()->forget("title");
        }
        if(request()->exists('description')){
            $films = $films->orderBy('description', $this->getOrder('description'));
            $path = "description";
        }else{
            request()->session()->forget("description");
        }
        if(request()->exists('price')){
            $films = $films->orderBy('price', $this->getOrder('price'));
            $path = "price";
        }else{
            request()->session()->forget("price");
        }
        if(request()->exists('famous')){
            $films = $films->orderBy('famous', $this->getOrder('famous'));
            $path = "famous";
        }else{
            request()->session()->forget("famous");
        }
         $films = $films->paginate(20);
        $films->setPath("sort?$path");
        return view('film_show', compact('films'));

    }else{

      if(request()->exists('tab') == 'director'){

         if(request()->exists('name')){
             session(['sortOrder' => $this->getOrder('name')]);
             session(['sortKey' => 'name']);
        }else{
            request()->session()->forget("name");
        }

         if(request()->exists('birth')){
             session(['sortOrder' => $this->getOrder('birth')]);
             session(['sortKey' => 'birth']);
        }else{
            request()->session()->forget("birth");
        }

         if(request()->exists('bio')){
             session(['sortOrder' => $this->getOrder('bio')]);
             session(['sortKey' => 'bio']);
        }else{
            request()->session()->forget("bio");
        }

         
      }
         return back();
    }
    }

    /**
    * Clear Search Pattern
    *
    */
    public function clearSearch(){
        request()->session()->forget("keyword");
        return back();
    }

    function updateDirector(Film $film ){
        $director = \App\Director::find(request()->get('director'));
        $film->director()->associate($director)->save();
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

