<?php 
namespace App\Http\Controllers;

use App\Store;
    use App\Address;

    use App\Staff;

    use App\Film;

    use App\Customer;

     
class StoreController extends Controller {


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
        $this->authorize("view", Store::class);

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
        $this->authorize("create", Store::class);

        return view(' store ');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return  Response
    */
    public function store()
    {
        $this->authorize("create", Store::class);

         $data = request()->all();

$store = Store::create([
   ]);

    if(request()->exists('address')){
    $address = Address::find(request()->get('address'));
    $store->address()->associate($address)->save();
    }

      if(request()->exists('film')){
    $store->film()->attach($data["film"]);
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
        $this->authorize("view", Store::class);

        request()->session()->forget("mutate");
         $store->load(array("address","staff","film","customer",));
return view('store_display', compact('store')); 
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param    Mixed
    * @return  Response
    */
    public function edit( Store $store )
    {
        $this->authorize("update", Store::class);

        request()->session()->forget("mutate");
         $store->load(array("address","staff","film","customer",));
return view('store_edit', compact('store')); 
    }

    /**
    * Update the specified resource in storage.
    *
    * @param    Mixed
    * @return  Response
    */
    public function update( Store $store  )
    {
        $this->authorize("update", Store::class);

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
     if(request()->exists('film')){
    $store->film()->sync(request()->get('film'));
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
    public function destroy( Store $store )
    {
        $this->authorize("delete", Store::class);

         $store->delete();         return back();
    }

    /**
    * Load and display related tables.
    * @param    Mixed
    * @return  Response
    */
    public function related( Store $store ){

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
         $store->load(array("address","staff","film","customer",));
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
return view('store_show', compact('stores'));     }

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
}     }

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
    function addFilm(Store $store ){
        $store->film()->sync(request()->get('film'));
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

