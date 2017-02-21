<?php 
namespace App\Http\Controllers;

use App\Inventory;
    use App\Film;

    use App\Store;

     
class InventoryController extends Controller {

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
        return view('inventory_show', ['inventorys' => Inventory::paginate(20)]);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return  Response
    */
    public function create()
    {
        return view(' inventory ');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return  Response
    */
    public function store()
    {
         $data = request()->all();

$inventory = Inventory::create([
    ]);

    if(request()->exists('film')){
    $film = Film::find(request()->get('film'));
    $inventory->film()->associate($film)->save();
    }

     if(request()->exists('store')){
    $store = Store::find(request()->get('store'));
    $inventory->store()->associate($store)->save();
    }

   
        return  isset($data['carl'])?redirect('/inventory'):back();     }

    /**
    * Display the specified resource.
    *
    * @param    Mixed
    * @return  Response
    */
    public function show( Inventory $inventory )
    {
        request()->session()->forget("mutate");
         $inventory->load(array("film","store",));
return view('inventory_display', compact('inventory')); 
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param    Mixed
    * @return  Response
    */
    public function edit(Inventory $inventory )
    {
        request()->session()->forget("mutate");
        $inventory->load(array("film","store",));
return view('inventory_edit', compact('inventory'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param    Mixed
    * @return  Response
    */
    public function update(Inventory $inventory )
    {
            $data = request()->all();

    $updateFields = array();
        
    $inventory->update($updateFields);

            if(request()->exists('film')){
            $film = \App\Film::find(request()->get('film'));
            $inventory->film()->associate($film)->save();
        }

             if(request()->exists('store')){
            $store = \App\Store::find(request()->get('store'));
            $inventory->store()->associate($store)->save();
        }

      



        return back();
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param    Mixed
    * @return  Response
    */
    public function destroy(Inventory $inventory )
    {
        $inventory->delete();         return back();
    }

    /**
    * Load and display related tables.
    * @param    Mixed
    * @return  Response
    */
    public function related(Inventory $inventory ){

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
        $inventory->load(array("film","store",));
        return view('inventory_related', compact(['inventory', 'table']));
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

        $inventorys = Inventory::where('inventory_id', 'like', $keyword)
         ->orWhere('inventory_id', 'like', $keyword)

         ->orWhere('film_id', 'like', $keyword)

         ->orWhere('store_id', 'like', $keyword)

         ->orWhere('last_update', 'like', $keyword)

        ->paginate(20);

        $inventorys->setPath("search?keyword=$keyword");
        return view('inventory_show', compact('inventorys'));
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
        $inventorys = Inventory::query();
            $inventorys = $inventorys->paginate(20);
        $inventorys->setPath("sort?$path");
        return view('inventory_show', compact('inventorys'));

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
      if(request()->exists('tab') == 'store'){

           
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

    function updateFilm(Inventory $inventory ){
        $film = \App\Film::find(request()->get('film'));
        $inventory->film()->associate($film)->save();
        return back();
    }
function updateStore(Inventory $inventory ){
        $store = \App\Store::find(request()->get('store'));
        $inventory->store()->associate($store)->save();
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

