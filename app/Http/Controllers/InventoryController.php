<?php 
namespace App\Http\Controllers;

use App\Inventory;
    use App\Customer;

     
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

    if(request()->exists('customer')){
    $inventory->customer()->attach($data["customer"]);
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
         $inventory->load(array("customer",));
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
        $inventory->load(array("customer",));
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

            if(request()->exists('customer')){
            $inventory->customer()->sync(request()->get('customer'));
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
        $inventory->load(array("customer",));
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

      if(request()->exists('tab') == 'customer'){

          if(request()->exists('first_name')){
             session(['sortOrder' => $this->getOrder('first_name')]);
             session(['sortKey' => 'first_name']);
        }else{
            request()->session()->forget("first_name");
        }

         if(request()->exists('last_name')){
             session(['sortOrder' => $this->getOrder('last_name')]);
             session(['sortKey' => 'last_name']);
        }else{
            request()->session()->forget("last_name");
        }

         if(request()->exists('email')){
             session(['sortOrder' => $this->getOrder('email')]);
             session(['sortKey' => 'email']);
        }else{
            request()->session()->forget("email");
        }

          if(request()->exists('active')){
             session(['sortOrder' => $this->getOrder('active')]);
             session(['sortKey' => 'active']);
        }else{
            request()->session()->forget("active");
        }

         if(request()->exists('create_date')){
             session(['sortOrder' => $this->getOrder('create_date')]);
             session(['sortKey' => 'create_date']);
        }else{
            request()->session()->forget("create_date");
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

    function addCustomer(Inventory $inventory ){
        $inventory->customer()->sync(request()->get('customer'));
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
