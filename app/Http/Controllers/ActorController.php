<?php 
namespace App\Http\Controllers;

use App\Actor;
    use App\Film;

     
class ActorController extends Controller {


    /**
    *   Create a new controller instance.
    *
    *   @return  void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    * Display a listing of the resource.
    *
    * @return  Response
    */
    public function index()
    {
        $this->authorize("view", Actor::class);

        request()->session()->forget("keyword");
        request()->session()->forget("clear");
        request()->session()->forget("defaultSelect");
        session(["mutate" => '1']);
        return view('actor_show', ['actors' => Actor::paginate(20)]);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return  Response
    */
    public function create()
    {
        $this->authorize("create", Actor::class);

        return view(' actor ');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return  Response
    */
    public function store()
    {
        $this->authorize("create", Actor::class);

         $data = request()->all();

$actor = Actor::create([
     "first_name" => $data["first_name"],
     "last_name" => $data["last_name"],
  ]);

    if(request()->exists('film')){
    $actor->film()->attach($data["film"]);
    }
   
        return  isset($data['carl'])?redirect('/actor'):back();     }

    /**
    * Display the specified resource.
    *
    * @param    Mixed
    * @return  Response
    */
    public function show( Actor $actor )
    {
        $this->authorize("view", Actor::class);

        request()->session()->forget("mutate");
         $actor->load(array("film",));
return view('actor_display', compact('actor')); 
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param    Mixed
    * @return  Response
    */
    public function edit( Actor $actor )
    {
        $this->authorize("update", Actor::class);

        request()->session()->forget("mutate");
         $actor->load(array("film",));
return view('actor_edit', compact('actor')); 
    }

    /**
    * Update the specified resource in storage.
    *
    * @param    Mixed
    * @return  Response
    */
    public function update( Actor $actor  )
    {
        $this->authorize("update", Actor::class);

         $data = request()->all();

$updateFields = array();
     $updateFields["first_name"] = $data["first_name"];
      $updateFields["last_name"] = $data["last_name"];
   
$actor->update($updateFields);

    if(request()->exists('film')){
    $actor->film()->sync(request()->get('film'));
    }

  

 
        return back();
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param    Mixed
    * @return  Response
    */
    public function destroy( Actor $actor )
    {
        $this->authorize("delete", Actor::class);

         $actor->delete();         return back();
    }

    /**
    * Load and display related tables.
    * @param    Mixed
    * @return  Response
    */
    public function related( Actor $actor ){

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
         $actor->load(array("film",));
return view('actor_related', compact(['actor', 'table']));
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

         $actors = Actor::where('actor_id', 'like', $keyword)
     ->orWhere('actor_id', 'like', $keyword)

     ->orWhere('first_name', 'like', $keyword)

     ->orWhere('last_name', 'like', $keyword)

     ->orWhere('last_update', 'like', $keyword)

->paginate(20);

$actors->setPath("search?keyword=$keyword");
return view('actor_show', compact('actors'));     }

    /**
    * Sort Table element
    * @return  Response
    */
    public function sort(){
        $path = "";

         request()->session()->forget("sortKey");
request()->session()->forget("sortOrder");
if(!request()->exists('tab')){
$actors = Actor::query();
     if(request()->exists('first_name')){
    $actors = $actors->orderBy('first_name', $this->getOrder('first_name'));
    $path = "first_name";
    }else{
    request()->session()->forget("first_name");
    }
     if(request()->exists('last_name')){
    $actors = $actors->orderBy('last_name', $this->getOrder('last_name'));
    $path = "last_name";
    }else{
    request()->session()->forget("last_name");
    }
  $actors = $actors->paginate(20);
$actors->setPath("sort?$path");
return view('actor_show', compact('actors'));

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

     if(request()->exists('release_year')){
    session(['sortOrder' => $this->getOrder('release_year')]);
    session(['sortKey' => 'release_year']);
    }else{
    request()->session()->forget("release_year");
    }

      if(request()->exists('rental_duration')){
    session(['sortOrder' => $this->getOrder('rental_duration')]);
    session(['sortKey' => 'rental_duration']);
    }else{
    request()->session()->forget("rental_duration");
    }

     if(request()->exists('rental_rate')){
    session(['sortOrder' => $this->getOrder('rental_rate')]);
    session(['sortKey' => 'rental_rate']);
    }else{
    request()->session()->forget("rental_rate");
    }

     if(request()->exists('length')){
    session(['sortOrder' => $this->getOrder('length')]);
    session(['sortKey' => 'length']);
    }else{
    request()->session()->forget("length");
    }

     if(request()->exists('replacement_cost')){
    session(['sortOrder' => $this->getOrder('replacement_cost')]);
    session(['sortKey' => 'replacement_cost']);
    }else{
    request()->session()->forget("replacement_cost");
    }

    
}
 return back();
}     }

    /**
    * Clear Search Pattern
    *
    */
    public function clearSearch(){
        request()->session()->forget("keyword");
        return back();
    }

     function addFilm(Actor $actor ){
        $actor->film()->sync(request()->get('film'));
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

