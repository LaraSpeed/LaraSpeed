<?php 
namespace App\Http\Controllers;

use App\Country;
    use App\City;

     
class CountryController extends Controller {

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
        return view('country_show', ['countrys' => Country::paginate(20)]);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return  Response
    */
    public function create()
    {
        return view(' country ');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return  Response
    */
    public function store()
    {
         $data = request()->all();

$country = Country::create([
     "country" => $data["country"],
  ]);

   
        return  isset($data['carl'])?redirect('/country'):back();     }

    /**
    * Display the specified resource.
    *
    * @param    Mixed
    * @return  Response
    */
    public function show( Country $country )
    {
        request()->session()->forget("mutate");
         $country->load(array("city",));
return view('country_display', compact('country')); 
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param    Mixed
    * @return  Response
    */
    public function edit( Country $country )
    {
        request()->session()->forget("mutate");
         $country->load(array("city",));
return view('country_edit', compact('country')); 
    }

    /**
    * Update the specified resource in storage.
    *
    * @param    Mixed
    * @return  Response
    */
    public function update(Country $country )
    {
            $data = request()->all();

    $updateFields = array();
             $updateFields["country"] = $data["country"];
           
    $country->update($updateFields);

            if(request()->exists('city')){

            $newOnes = \App\City::find(request()->get('city'));

            foreach ($newOnes as $newOne){
                $country->city()->save($newOne);
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
    public function destroy(Country $country )
    {
        $country->delete();         return back();
    }

    /**
    * Load and display related tables.
    * @param    Mixed
    * @return  Response
    */
    public function related(Country $country ){

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
        $country->load(array("city",));
        return view('country_related', compact(['country', 'table']));
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

        $countrys = Country::where('country_id', 'like', $keyword)
         ->orWhere('country_id', 'like', $keyword)

         ->orWhere('country', 'like', $keyword)

         ->orWhere('last_update', 'like', $keyword)

        ->paginate(20);

        $countrys->setPath("search?keyword=$keyword");
        return view('country_show', compact('countrys'));
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
        $countrys = Country::query();
        if(request()->exists('country')){
            $countrys = $countrys->orderBy('country', $this->getOrder('country'));
            $path = "country";
        }else{
            request()->session()->forget("country");
        }
          $countrys = $countrys->paginate(20);
        $countrys->setPath("sort?$path");
        return view('country_show', compact('countrys'));

    }else{

      if(request()->exists('tab') == 'city'){

         if(request()->exists('city')){
             session(['sortOrder' => $this->getOrder('city')]);
             session(['sortKey' => 'city']);
        }else{
            request()->session()->forget("city");
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

    function addCity(Country $country ){
        $newOnes = City::find(request()->get('film'));

        foreach ($newOnes as $newOne){
            $country->city()->save($newOne);
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

