<?php 
namespace App\Http\Controllers;

use App\Address;
    use App\Customer;

    use App\Staff;

    use App\Store;

    use App\City;

     
class AddressController extends Controller {


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
        $this->authorize("view", Address::class);

        request()->session()->forget("keyword");
        request()->session()->forget("clear");
        request()->session()->forget("defaultSelect");
        session(["mutate" => '1']);
        return view('address_show', ['addresss' => Address::paginate(20)]);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return  Response
    */
    public function create()
    {
        $this->authorize("create", Address::class);

        return view(' address ');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return  Response
    */
    public function store()
    {
        $this->authorize("create", Address::class);

         $data = request()->all();

$address = Address::create([
     "address" => $data["address"],
     "address2" => $data["address2"],
     "district" => $data["district"],
      "postal_code" => $data["postal_code"],
     "phone" => $data["phone"],
  ]);

       if(request()->exists('city')){
    $city = City::find(request()->get('city'));
    $address->city()->associate($city)->save();
    }

   
        return  isset($data['carl'])?redirect('/address'):back();     }

    /**
    * Display the specified resource.
    *
    * @param    Mixed
    * @return  Response
    */
    public function show( Address $address )
    {
        $this->authorize("view", Address::class);

        request()->session()->forget("mutate");
         $address->load(array("customer","staff","store","city",));
return view('address_display', compact('address')); 
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param    Mixed
    * @return  Response
    */
    public function edit( Address $address )
    {
        $this->authorize("update", Address::class);

        request()->session()->forget("mutate");
         $address->load(array("customer","staff","store","city",));
return view('address_edit', compact('address')); 
    }

    /**
    * Update the specified resource in storage.
    *
    * @param    Mixed
    * @return  Response
    */
    public function update( Address $address  )
    {
        $this->authorize("update", Address::class);

         $data = request()->all();

$updateFields = array();
     $updateFields["address"] = $data["address"];
      $updateFields["address2"] = $data["address2"];
      $updateFields["district"] = $data["district"];
       $updateFields["postal_code"] = $data["postal_code"];
      $updateFields["phone"] = $data["phone"];
   
$address->update($updateFields);

    if(request()->exists('customer')){

    $newOnes = \App\Customer::find(request()->get('customer'));

    foreach ($newOnes as $newOne){
    $address->customer()->save($newOne);
    }

    }
     if(request()->exists('staff')){

    $newOnes = \App\Staff::find(request()->get('staff'));

    foreach ($newOnes as $newOne){
    $address->staff()->save($newOne);
    }

    }
     if(request()->exists('store')){

    $newOnes = \App\Store::find(request()->get('store'));

    foreach ($newOnes as $newOne){
    $address->store()->save($newOne);
    }

    }
     if(request()->exists('city')){
    $city = \App\City::find(request()->get('city'));
    $address->city()->associate($city)->save();
    }

  

 
        return back();
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param    Mixed
    * @return  Response
    */
    public function destroy( Address $address )
    {
        $this->authorize("delete", Address::class);

         $address->delete();         return back();
    }

    /**
    * Load and display related tables.
    * @param    Mixed
    * @return  Response
    */
    public function related( Address $address ){

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
         $address->load(array("customer","staff","store","city",));
return view('address_related', compact(['address', 'table']));
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

         $addresss = Address::where('address_id', 'like', $keyword)
     ->orWhere('address_id', 'like', $keyword)

     ->orWhere('address', 'like', $keyword)

     ->orWhere('address2', 'like', $keyword)

     ->orWhere('district', 'like', $keyword)

     ->orWhere('city_id', 'like', $keyword)

     ->orWhere('postal_code', 'like', $keyword)

     ->orWhere('phone', 'like', $keyword)

     ->orWhere('last_update', 'like', $keyword)

->paginate(20);

$addresss->setPath("search?keyword=$keyword");
return view('address_show', compact('addresss'));     }

    /**
    * Sort Table element
    * @return  Response
    */
    public function sort(){
        $path = "";

         request()->session()->forget("sortKey");
request()->session()->forget("sortOrder");
if(!request()->exists('tab')){
$addresss = Address::query();
     if(request()->exists('address')){
    $addresss = $addresss->orderBy('address', $this->getOrder('address'));
    $path = "address";
    }else{
    request()->session()->forget("address");
    }
     if(request()->exists('address2')){
    $addresss = $addresss->orderBy('address2', $this->getOrder('address2'));
    $path = "address2";
    }else{
    request()->session()->forget("address2");
    }
     if(request()->exists('district')){
    $addresss = $addresss->orderBy('district', $this->getOrder('district'));
    $path = "district";
    }else{
    request()->session()->forget("district");
    }
      if(request()->exists('postal_code')){
    $addresss = $addresss->orderBy('postal_code', $this->getOrder('postal_code'));
    $path = "postal_code";
    }else{
    request()->session()->forget("postal_code");
    }
     if(request()->exists('phone')){
    $addresss = $addresss->orderBy('phone', $this->getOrder('phone'));
    $path = "phone";
    }else{
    request()->session()->forget("phone");
    }
  $addresss = $addresss->paginate(20);
$addresss->setPath("sort?$path");
return view('address_show', compact('addresss'));

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
  if(request()->exists('tab') == 'store'){

   
}
  if(request()->exists('tab') == 'city'){

     if(request()->exists('city')){
    session(['sortOrder' => $this->getOrder('city')]);
    session(['sortKey' => 'city']);
    }else{
    request()->session()->forget("city");
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

     function addCustomer(Address $address ){
        $newOnes = Customer::find(request()->get('film'));

        foreach ($newOnes as $newOne){
            $address->customer()->save($newOne);
        }

        return back();
    }
    function addStaff(Address $address ){
        $newOnes = Staff::find(request()->get('film'));

        foreach ($newOnes as $newOne){
            $address->staff()->save($newOne);
        }

        return back();
    }
    function addStore(Address $address ){
        $newOnes = Store::find(request()->get('film'));

        foreach ($newOnes as $newOne){
            $address->store()->save($newOne);
        }

        return back();
    }
    function updateCity(Address $address ){
        $city = \App\City::find(request()->get('city'));
        $address->city()->associate($city)->save();
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

