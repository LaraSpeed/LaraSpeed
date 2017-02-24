<?php 
namespace App\Http\Controllers;

use App\City;
    use App\Address;

    use App\Country;

     
class CityController extends Controller {

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
        return view('city_show', ['citys' => City::paginate(20)]);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return  Response
    */
    public function create()
    {
        return view(' city ');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return  Response
    */
    public function store()
    {
         $data = request()->all();

$city = City::create([
     "city" => $data["city"],
   ]);

     if(request()->exists('country')){
    $country = Country::find(request()->get('country'));
    $city->country()->associate($country)->save();
    }

   
        return  isset($data['carl'])?redirect('/city'):back();     }

    /**
    * Display the specified resource.
    *
    * @param    Mixed
    * @return  Response
    */
    public function show( City $city )
    {
        request()->session()->forget("mutate");
         $city->load(array("address","country",));
return view('city_display', compact('city')); 
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param    Mixed
    * @return  Response
    */
    public function edit( City $city )
    {
        request()->session()->forget("mutate");
         $city->load(array("address","country",));
return view('city_edit', compact('city')); 
    }

    /**
    * Update the specified resource in storage.
    *
    * @param    Mixed
    * @return  Response
    */
    public function update(City $city )
    {
            $data = request()->all();

    $updateFields = array();
             $updateFields["city"] = $data["city"];
       
    $city->update($updateFields);

            if(request()->exists('address')){

            $newOnes = \App\Address::find(request()->get('address'));

            foreach ($newOnes as $newOne){
                $city->address()->save($newOne);
            }

        }
             if(request()->exists('country')){
            $country = \App\Country::find(request()->get('country'));
            $city->country()->associate($country)->save();
        }

      



        return back();
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param    Mixed
    * @return  Response
    */
    public function destroy(City $city )
    {
        $city->delete();         return back();
    }

    /**
    * Load and display related tables.
    * @param    Mixed
    * @return  Response
    */
    public function related(City $city ){

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
        $city->load(array("address","country",));
        return view('city_related', compact(['city', 'table']));
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

        $citys = City::where('city_id', 'like', $keyword)
         ->orWhere('city_id', 'like', $keyword)

         ->orWhere('city', 'like', $keyword)

         ->orWhere('country_id', 'like', $keyword)

         ->orWhere('last_update', 'like', $keyword)

        ->paginate(20);

        $citys->setPath("search?keyword=$keyword");
        return view('city_show', compact('citys'));
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
        $citys = City::query();
        if(request()->exists('city')){
            $citys = $citys->orderBy('city', $this->getOrder('city'));
            $path = "city";
        }else{
            request()->session()->forget("city");
        }
           $citys = $citys->paginate(20);
        $citys->setPath("sort?$path");
        return view('city_show', compact('citys'));

    }else{

      if(request()->exists('tab') == 'address'){

         if(request()->exists('address')){
             session(['sortOrder' => $this->getOrder('address')]);
             session(['sortKey' => 'address']);
        }else{
            request()->session()->forget("address");
        }

         if(request()->exists('address2')){
             session(['sortOrder' => $this->getOrder('address2')]);
             session(['sortKey' => 'address2']);
        }else{
            request()->session()->forget("address2");
        }

         if(request()->exists('district')){
             session(['sortOrder' => $this->getOrder('district')]);
             session(['sortKey' => 'district']);
        }else{
            request()->session()->forget("district");
        }

          if(request()->exists('postal_code')){
             session(['sortOrder' => $this->getOrder('postal_code')]);
             session(['sortKey' => 'postal_code']);
        }else{
            request()->session()->forget("postal_code");
        }

         if(request()->exists('phone')){
             session(['sortOrder' => $this->getOrder('phone')]);
             session(['sortKey' => 'phone']);
        }else{
            request()->session()->forget("phone");
        }

          
      }
      if(request()->exists('tab') == 'country'){

         if(request()->exists('country')){
             session(['sortOrder' => $this->getOrder('country')]);
             session(['sortKey' => 'country']);
        }else{
            request()->session()->forget("country");
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

    function addAddress(City $city ){
        $newOnes = Address::find(request()->get('film'));

        foreach ($newOnes as $newOne){
            $city->address()->save($newOne);
        }

        return back();
    }
function updateCountry(City $city ){
        $country = \App\Country::find(request()->get('country'));
        $city->country()->associate($country)->save();
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

