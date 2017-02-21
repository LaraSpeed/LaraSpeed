<?php 
namespace App\Http\Controllers;

use App\Rental;
    use App\Payment;

    use App\Staff;

    use App\Customer;

    use App\Inventory;

     
class RentalController extends Controller {

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
        return view('rental_show', ['rentals' => Rental::paginate(20)]);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return  Response
    */
    public function create()
    {
        return view(' rental ');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return  Response
    */
    public function store()
    {
         $data = request()->all();

$rental = Rental::create([
     "rental_date" => $data["rental_date"],
       "return_date" => $data["return_date"],
   ]);

     if(request()->exists('staff')){
    $staff = Staff::find(request()->get('staff'));
    $rental->staff()->associate($staff)->save();
    }

     if(request()->exists('customer')){
    $customer = Customer::find(request()->get('customer'));
    $rental->customer()->associate($customer)->save();
    }

     if(request()->exists('inventory')){
    $inventory = Inventory::find(request()->get('inventory'));
    $rental->inventory()->associate($inventory)->save();
    }

   
        return  isset($data['carl'])?redirect('/rental'):back();     }

    /**
    * Display the specified resource.
    *
    * @param    Mixed
    * @return  Response
    */
    public function show( Rental $rental )
    {
        request()->session()->forget("mutate");
         $rental->load(array("payment","staff","customer","inventory",));
return view('rental_display', compact('rental')); 
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param    Mixed
    * @return  Response
    */
    public function edit(Rental $rental )
    {
        request()->session()->forget("mutate");
        $rental->load(array("payment","staff","customer","inventory",));
return view('rental_edit', compact('rental'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param    Mixed
    * @return  Response
    */
    public function update(Rental $rental )
    {
            $data = request()->all();

    $updateFields = array();
             $updateFields["rental_date"] = $data["rental_date"];
               $updateFields["return_date"] = $data["return_date"];
       
    $rental->update($updateFields);

            if(request()->exists('payment')){

            $newOnes = \App\Payment::find(request()->get('payment'));

            foreach ($newOnes as $newOne){
                $rental->payment()->save($newOne);
            }

        }
             if(request()->exists('staff')){
            $staff = \App\Staff::find(request()->get('staff'));
            $rental->staff()->associate($staff)->save();
        }

             if(request()->exists('customer')){
            $customer = \App\Customer::find(request()->get('customer'));
            $rental->customer()->associate($customer)->save();
        }

             if(request()->exists('inventory')){
            $inventory = \App\Inventory::find(request()->get('inventory'));
            $rental->inventory()->associate($inventory)->save();
        }

      



        return back();
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param    Mixed
    * @return  Response
    */
    public function destroy(Rental $rental )
    {
        $rental->delete();         return back();
    }

    /**
    * Load and display related tables.
    * @param    Mixed
    * @return  Response
    */
    public function related(Rental $rental ){

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
        $rental->load(array("payment","staff","customer","inventory",));
        return view('rental_related', compact(['rental', 'table']));
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

        $rentals = Rental::where('rental_id', 'like', $keyword)
         ->orWhere('rental_id', 'like', $keyword)

         ->orWhere('rental_date', 'like', $keyword)

         ->orWhere('inventory_id', 'like', $keyword)

         ->orWhere('customer_id', 'like', $keyword)

         ->orWhere('return_date', 'like', $keyword)

         ->orWhere('staff_id', 'like', $keyword)

         ->orWhere('last_update', 'like', $keyword)

        ->paginate(20);

        $rentals->setPath("search?keyword=$keyword");
        return view('rental_show', compact('rentals'));
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
        $rentals = Rental::query();
        if(request()->exists('rental_date')){
            $rentals = $rentals->orderBy('rental_date', $this->getOrder('rental_date'));
            $path = "rental_date";
        }else{
            request()->session()->forget("rental_date");
        }
          if(request()->exists('return_date')){
            $rentals = $rentals->orderBy('return_date', $this->getOrder('return_date'));
            $path = "return_date";
        }else{
            request()->session()->forget("return_date");
        }
           $rentals = $rentals->paginate(20);
        $rentals->setPath("sort?$path");
        return view('rental_show', compact('rentals'));

    }else{

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
      if(request()->exists('tab') == 'inventory'){

            
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

    function addPayment(Rental $rental ){
        $newOnes = Payment::find(request()->get('film'));

        foreach ($newOnes as $newOne){
            $rental->payment()->save($newOne);
        }

        return back();
    }
function updateStaff(Rental $rental ){
        $staff = \App\Staff::find(request()->get('staff'));
        $rental->staff()->associate($staff)->save();
        return back();
    }
function updateCustomer(Rental $rental ){
        $customer = \App\Customer::find(request()->get('customer'));
        $rental->customer()->associate($customer)->save();
        return back();
    }
function updateInventory(Rental $rental ){
        $inventory = \App\Inventory::find(request()->get('inventory'));
        $rental->inventory()->associate($inventory)->save();
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
