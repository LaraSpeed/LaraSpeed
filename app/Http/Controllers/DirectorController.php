<?php 
namespace App\Http\Controllers;

use App\Director;
    use App\Film;

     
class DirectorController extends Controller {

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
        return view('director_show', ['directors' => Director::paginate(20)]);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return  Response
    */
    public function create()
    {
        return view('director');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return  Response
    */
    public function store()
    {
        $data = request()->all();

        $director = Director::create([
             "name" => $data["name"],
                 "birth" => $data["birth"],
                 "bio" => $data["bio"],
             ]);

      
        return redirect('/director');    }

    /**
    * Display the specified resource.
    *
    * @param    Mixed
    * @return  Response
    */
    public function show(Director $director )
    {
        request()->session()->forget("mutate");
        $director->load(array("film",));
return view('director_display', compact('director'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param    Mixed
    * @return  Response
    */
    public function edit(Director $director )
    {
        request()->session()->forget("mutate");
        $director->load(array("film",));
return view('director_edit', compact('director'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param    Mixed
    * @return  Response
    */
    public function update(Director $director )
    {
            $data = request()->all();

    $updateFields = array();
             $updateFields["name"] = $data["name"];
             $updateFields["birth"] = $data["birth"];
             $updateFields["bio"] = $data["bio"];
     
    $director->update($updateFields);

            if(request()->exists('film')){

            $newOnes = \App\Film::find(request()->get('film'));

            foreach ($newOnes as $newOne){
                $director->film()->save($newOne);
            }

        }
      



        return back();
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param    Mixed
    * @return  Response
    */
    public function destroy(Director $director )
    {
        $director->delete();         return back();
    }

    /**
    * Load and display related tables.
    * @param    Mixed
    * @return  Response
    */
    public function related(Director $director ){

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
        $director->load(array("film",));
        return view('director_related', compact(['director', 'table']));
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

        $directors = Director::where('id', 'like', $keyword)
         ->orWhere('id', 'like', $keyword)

         ->orWhere('name', 'like', $keyword)

         ->orWhere('birth', 'like', $keyword)

         ->orWhere('bio', 'like', $keyword)

        ->paginate(20);

        $directors->setPath("search?keyword=$keyword");
        return view('director_show', compact('directors'));
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
        $directors = Director::query();
        if(request()->exists('name')){
            $directors = $directors->orderBy('name', $this->getOrder('name'));
            $path = "name";
        }else{
            request()->session()->forget("name");
        }
        if(request()->exists('birth')){
            $directors = $directors->orderBy('birth', $this->getOrder('birth'));
            $path = "birth";
        }else{
            request()->session()->forget("birth");
        }
        if(request()->exists('bio')){
            $directors = $directors->orderBy('bio', $this->getOrder('bio'));
            $path = "bio";
        }else{
            request()->session()->forget("bio");
        }
         $directors = $directors->paginate(20);
        $directors->setPath("sort?$path");
        return view('director_show', compact('directors'));

    }else{

      if(request()->exists('tab') == 'film'){

         if(request()->exists('title')){
             session(['sortOrder' => $this->getOrder('title')]);
             session(['sortKey' => 'title']);
        }else{
            request()->session()->forget("title");
        }

         if(request()->exists('description')){
             session(['sortOrder' => $this->getOrder('description')]);
             session(['sortKey' => 'description']);
        }else{
            request()->session()->forget("description");
        }

         if(request()->exists('price')){
             session(['sortOrder' => $this->getOrder('price')]);
             session(['sortKey' => 'price']);
        }else{
            request()->session()->forget("price");
        }

         if(request()->exists('famous')){
             session(['sortOrder' => $this->getOrder('famous')]);
             session(['sortKey' => 'famous']);
        }else{
            request()->session()->forget("famous");
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

    function addFilm(Director $director ){
        $newOnes = Film::find(request()->get('film'));

        foreach ($newOnes as $newOne){
            $director->film()->save($newOne);
        }

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

