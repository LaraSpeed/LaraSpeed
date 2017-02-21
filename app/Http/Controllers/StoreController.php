<?php 
namespace App\Http\Controllers;

use App\Store;
    use App\Address;

    use App\Staff;

    use App\Inventory;

    use App\Customer;

     
class StoreController extends Controller {

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
        return view('store_show', ['stores' => Store::paginate(20)]);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return  Response
    */
    public function create()
    {
        return view(' store ');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return  Response
    */
    public function store()
    {
         $data = request()->all();

$store = Store::create([
   ]);

    if(request()->exists('address')){
    $address = Address::find(request()->get('address'));
    $store->address()->associate($address)->save();
    }

      
        return  isset($data['carl'])?redirect('/store'):back();     }

    /**
    * Display the specified resource.
    *
    * @param    Mixed
    * @return  Response
    */
    public function show( Store $store )
    {
        request()->session()->forget("mutate");
         $store->load(array("address","staff","inventory","customer",));
return view('store_display', compact('store')); 
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param    Mixed
    * @return  Response
    */
    public function edit(Store $store )
    {
        request()->session()->forget("mutate");
        $store->load(array("address","staff","inventory","customer",));
return view('store_edit', compact('store'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param    Mixed
    * @return  Response
    */
    public function update(Store $store )
    {
            $data = request()->all();

    $updateFields = array();
       
    $store->update($updateFields);

            if(request()->exists('address')){
            $address = \App\Address::find(request()->get('address'));
            $store->address()->associate($address)->save();
        }

             if(request()->exists('staff')){

            $newOnes = \App\Staff::find(request()->get('staff'));

            foreach ($newOnes as $newOne){
                $store->staff()->save($newOne);
            }

        }
             if(request()->exists('inventory')){

            $newOnes = \App\Inventory::find(request()->get('inventory'));

            foreach ($newOnes as $newOne){
                $store->inventory()->save($newOne);
            }

        }
             if(request()->exists('customer')){

            $newOnes = \App\Customer::find(request()->get('customer'));

            foreach ($newOnes as $newOne){
                $store->customer()->save($newOne);
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
    public function destroy(Store $store )
    {
        $store->delete();         return back();
    }

    /**
    * Load and display related tables.
    * @param    Mixed
    * @return  Response
    */
    public function related(Store $store ){

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
        $store->load(array("address","staff","inventory","customer",));
        return view('store_related', compact(['store', 'table']));
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

        $stores = Store::where('store_id', 'like', $keyword)
         ->orWhere('store_id', 'like', $keyword)

         ->orWhere('manager_staff_id', 'like', $keyword)

         ->orWhere('address_id', 'like', $keyword)

        ->paginate(20);

        $stores->setPath("search?keyword=$keyword");
        return view('store_show', compact('stores'));
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
        $stores = Store::query();
           $stores = $stores->paginate(20);
        $stores->setPath("sort?$path");
        return view('store_show', compact('stores'));

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
      if(request()->exists('tab') == 'staff'){

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

         if(request()->exists('username')){
             session(['sortOrder' => $this->getOrder('username')]);
             session(['sortKey' => 'username']);
        }else{
            request()->session()->forget("username");
        }

         if(request()->exists('password')){
             session(['sortOrder' => $this->getOrder('password')]);
             session(['sortKey' => 'password']);
        }else{
            request()->session()->forget("password");
        }

          
      }
      if(request()->exists('tab') == 'inventory'){

            
      }
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

    function updateAddress(Store $store ){
        $address = \App\Address::find(request()->get('address'));
        $store->address()->associate($address)->save();
        return back();
    }
function addStaff(Store $store ){
        $newOnes = Staff::find(request()->get('film'));

        foreach ($newOnes as $newOne){
            $store->staff()->save($newOne);
        }

        return back();
    }
function addInventory(Store $store ){
        $newOnes = Inventory::find(request()->get('film'));

        foreach ($newOnes as $newOne){
            $store->inventory()->save($newOne);
        }

        return back();
    }
function addCustomer(Store $store ){
        $newOnes = Customer::find(request()->get('film'));

        foreach ($newOnes as $newOne){
            $store->customer()->save($newOne);
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

