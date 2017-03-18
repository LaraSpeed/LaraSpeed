<?php 
namespace App\Http\Controllers;

use App\Staff;
    use App\Rental;

    use App\Payment;

    use App\Address;

    use App\Store;

     
class StaffController extends Controller {


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
        $this->authorize("view", Staff::class);

        request()->session()->forget("keyword");
        request()->session()->forget("clear");
        request()->session()->forget("defaultSelect");
        session(["mutate" => '1']);
        return view('staff_show', ['staffs' => Staff::paginate(20)]);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return  Response
    */
    public function create()
    {
        $this->authorize("create", Staff::class);

        return view(' staff ');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return  Response
    */
    public function store()
    {
        $this->authorize("create", Staff::class);

         $data = request()->all();

$staff = Staff::create([
     "first_name" => $data["first_name"],
     "last_name" => $data["last_name"],
      "email" => $data["email"],
      "active" => $data["active"],
     "username" => $data["username"],
     "password" => $data["password"],
  ]);

      if(request()->exists('address')){
    $address = Address::find(request()->get('address'));
    $staff->address()->associate($address)->save();
    }

     if(request()->exists('store')){
    $store = Store::find(request()->get('store'));
    $staff->store()->associate($store)->save();
    }

   
        return  isset($data['carl'])?redirect('/staff'):back();     }

    /**
    * Display the specified resource.
    *
    * @param    Mixed
    * @return  Response
    */
    public function show( Staff $staff )
    {
        $this->authorize("view", Staff::class);

        request()->session()->forget("mutate");
         $staff->load(array("rental","payment","address","store",));
return view('staff_display', compact('staff')); 
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param    Mixed
    * @return  Response
    */
    public function edit( Staff $staff )
    {
        $this->authorize("update", Staff::class);

        request()->session()->forget("mutate");
         $staff->load(array("rental","payment","address","store",));
return view('staff_edit', compact('staff')); 
    }

    /**
    * Update the specified resource in storage.
    *
    * @param    Mixed
    * @return  Response
    */
    public function update( Staff $staff  )
    {
        $this->authorize("update", Staff::class);

         $data = request()->all();

$updateFields = array();
     $updateFields["first_name"] = $data["first_name"];
      $updateFields["last_name"] = $data["last_name"];
       $updateFields["email"] = $data["email"];
       $updateFields["active"] = $data["active"];
      $updateFields["username"] = $data["username"];
      $updateFields["password"] = $data["password"];
   
$staff->update($updateFields);

    if(request()->exists('rental')){

    $newOnes = \App\Rental::find(request()->get('rental'));

    foreach ($newOnes as $newOne){
    $staff->rental()->save($newOne);
    }

    }
     if(request()->exists('payment')){

    $newOnes = \App\Payment::find(request()->get('payment'));

    foreach ($newOnes as $newOne){
    $staff->payment()->save($newOne);
    }

    }
     if(request()->exists('address')){
    $address = \App\Address::find(request()->get('address'));
    $staff->address()->associate($address)->save();
    }

     if(request()->exists('store')){
    $store = \App\Store::find(request()->get('store'));
    $staff->store()->associate($store)->save();
    }

  

 
        return back();
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param    Mixed
    * @return  Response
    */
    public function destroy( Staff $staff )
    {
        $this->authorize("delete", Staff::class);

         $staff->delete();         return back();
    }

    /**
    * Load and display related tables.
    * @param    Mixed
    * @return  Response
    */
    public function related( Staff $staff ){

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
         $staff->load(array("rental","payment","address","store",));
return view('staff_related', compact(['staff', 'table']));
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

         $staffs = Staff::where('staff_id', 'like', $keyword)
     ->orWhere('staff_id', 'like', $keyword)

     ->orWhere('first_name', 'like', $keyword)

     ->orWhere('last_name', 'like', $keyword)

     ->orWhere('address_id', 'like', $keyword)

     ->orWhere('email', 'like', $keyword)

     ->orWhere('store_id', 'like', $keyword)

     ->orWhere('active', 'like', $keyword)

     ->orWhere('username', 'like', $keyword)

     ->orWhere('password', 'like', $keyword)

     ->orWhere('last_update', 'like', $keyword)

->paginate(20);

$staffs->setPath("search?keyword=$keyword");
return view('staff_show', compact('staffs'));     }

    /**
    * Sort Table element
    * @return  Response
    */
    public function sort(){
        $path = "";

         request()->session()->forget("sortKey");
request()->session()->forget("sortOrder");
if(!request()->exists('tab')){
$staffs = Staff::query();
     if(request()->exists('first_name')){
    $staffs = $staffs->orderBy('first_name', $this->getOrder('first_name'));
    $path = "first_name";
    }else{
    request()->session()->forget("first_name");
    }
     if(request()->exists('last_name')){
    $staffs = $staffs->orderBy('last_name', $this->getOrder('last_name'));
    $path = "last_name";
    }else{
    request()->session()->forget("last_name");
    }
      if(request()->exists('email')){
    $staffs = $staffs->orderBy('email', $this->getOrder('email'));
    $path = "email";
    }else{
    request()->session()->forget("email");
    }
      if(request()->exists('active')){
    $staffs = $staffs->orderBy('active', $this->getOrder('active'));
    $path = "active";
    }else{
    request()->session()->forget("active");
    }
     if(request()->exists('username')){
    $staffs = $staffs->orderBy('username', $this->getOrder('username'));
    $path = "username";
    }else{
    request()->session()->forget("username");
    }
     if(request()->exists('password')){
    $staffs = $staffs->orderBy('password', $this->getOrder('password'));
    $path = "password";
    }else{
    request()->session()->forget("password");
    }
  $staffs = $staffs->paginate(20);
$staffs->setPath("sort?$path");
return view('staff_show', compact('staffs'));

}else{

  if(request()->exists('tab') == 'rental'){

     if(request()->exists('rental_date')){
    session(['sortOrder' => $this->getOrder('rental_date')]);
    session(['sortKey' => 'rental_date']);
    }else{
    request()->session()->forget("rental_date");
    }

       if(request()->exists('return_date')){
    session(['sortOrder' => $this->getOrder('return_date')]);
    session(['sortKey' => 'return_date']);
    }else{
    request()->session()->forget("return_date");
    }

   
}
  if(request()->exists('tab') == 'payment'){

       if(request()->exists('amount')){
    session(['sortOrder' => $this->getOrder('amount')]);
    session(['sortKey' => 'amount']);
    }else{
    request()->session()->forget("amount");
    }

     if(request()->exists('payment_date')){
    session(['sortOrder' => $this->getOrder('payment_date')]);
    session(['sortKey' => 'payment_date']);
    }else{
    request()->session()->forget("payment_date");
    }

 
}
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
  if(request()->exists('tab') == 'store'){

   
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

     function addRental(Staff $staff ){
        $newOnes = Rental::find(request()->get('film'));

        foreach ($newOnes as $newOne){
            $staff->rental()->save($newOne);
        }

        return back();
    }
    function addPayment(Staff $staff ){
        $newOnes = Payment::find(request()->get('film'));

        foreach ($newOnes as $newOne){
            $staff->payment()->save($newOne);
        }

        return back();
    }
    function updateAddress(Staff $staff ){
        $address = \App\Address::find(request()->get('address'));
        $staff->address()->associate($address)->save();
        return back();
    }
    function updateStore(Staff $staff ){
        $store = \App\Store::find(request()->get('store'));
        $staff->store()->associate($store)->save();
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
