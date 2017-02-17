<?php 
namespace App\Http\Controllers;

use App\Customer;
    use App\Inventory;

    use App\Payment;

    use App\Address;

     
class CustomerController extends Controller {

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
        return view('customer_show', ['customers' => Customer::all()]);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return  Response
    */
    public function create()
    {
        return view('customer');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return  Response
    */
    public function store()
    {
        $data = request()->all();

        $customer = Customer::create([
              "first_name" => $data["first_name"],
                 "last_name" => $data["last_name"],
                 "email" => $data["email"],
                   "create_date" => $data["create_date"],
              ]);

        if(request()->exists('inventory')){
            $customer->inventory()->attach($data["inventory"]);
        }
          if(request()->exists('address')){
            $address = Address::find(request()->get('address'));
            $customer->address()->associate($address)->save();
         }

      
        return isset($data['carl'])?redirect('/customer'):back();    }

    /**
    * Display the specified resource.
    *
    * @param    Mixed
    * @return  Response
    */
    public function show(Customer $customer )
    {
        request()->session()->forget("mutate");
        $customer->load(array("inventory","payment","address",));
return view('customer_display', compact('customer'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param    Mixed
    * @return  Response
    */
    public function edit(Customer $customer )
    {
        request()->session()->forget("mutate");
        $customer->load(array("inventory","payment","address",));
return view('customer_edit', compact('customer'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param    Mixed
    * @return  Response
    */
    public function update(Customer $customer )
    {
            $data = request()->all();

    $updateFields = array();
              $updateFields["first_name"] = $data["first_name"];
             $updateFields["last_name"] = $data["last_name"];
             $updateFields["email"] = $data["email"];
               $updateFields["create_date"] = $data["create_date"];
      
    $customer->update($updateFields);

            if(request()->exists('inventory')){
            $customer->inventory()->sync(request()->get('inventory'));
        }

             if(request()->exists('payment')){

            $newOnes = \App\Payment::find(request()->get('payment'));

            foreach ($newOnes as $newOne){
                $customer->payment()->save($newOne);
            }

        }
             if(request()->exists('address')){
            $address = \App\Address::find(request()->get('address'));
            $customer->address()->associate($address)->save();
        }

      



        return back();
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param    Mixed
    * @return  Response
    */
    public function destroy(Customer $customer )
    {
        $customer->delete();         return back();
    }

    /**
    * Load and display related tables.
    * @param    Mixed
    * @return  Response
    */
    public function related(Customer $customer ){

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
        $customer->load(array("inventory","payment","address",));
        return view('customer_related', compact(['customer', 'table']));
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

        $customers = Customer::where('customer_id', 'like', $keyword)
         ->orWhere('customer_id', 'like', $keyword)

         ->orWhere('store_id', 'like', $keyword)

         ->orWhere('first_name', 'like', $keyword)

         ->orWhere('last_name', 'like', $keyword)

         ->orWhere('email', 'like', $keyword)

         ->orWhere('address_id', 'like', $keyword)

         ->orWhere('active', 'like', $keyword)

         ->orWhere('create_date', 'like', $keyword)

         ->orWhere('last_update', 'like', $keyword)

        ->paginate(20);

        $customers->setPath("search?keyword=$keyword");
        return view('customer_show', compact('customers'));
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
        $customers = Customer::query();
         if(request()->exists('first_name')){
            $customers = $customers->orderBy('first_name', $this->getOrder('first_name'));
            $path = "first_name";
        }else{
            request()->session()->forget("first_name");
        }
        if(request()->exists('last_name')){
            $customers = $customers->orderBy('last_name', $this->getOrder('last_name'));
            $path = "last_name";
        }else{
            request()->session()->forget("last_name");
        }
        if(request()->exists('email')){
            $customers = $customers->orderBy('email', $this->getOrder('email'));
            $path = "email";
        }else{
            request()->session()->forget("email");
        }
          if(request()->exists('create_date')){
            $customers = $customers->orderBy('create_date', $this->getOrder('create_date'));
            $path = "create_date";
        }else{
            request()->session()->forget("create_date");
        }
          $customers = $customers->paginate(20);
        $customers->setPath("sort?$path");
        return view('customer_show', compact('customers'));

    }else{

      if(request()->exists('tab') == 'inventory'){

            
      }
      if(request()->exists('tab') == 'payment'){

           if(request()->exists('amount')){
             session(['sortOrder' => $this->getOrder('amount')]);
             session(['sortKey' => 'amount']);
        }else{
            request()->session()->forget("amount");
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

    function addInventory(Customer $customer ){
        $customer->inventory()->sync(request()->get('inventory'));
        return back();
    }
function addPayment(Customer $customer ){
        $newOnes = Payment::find(request()->get('film'));

        foreach ($newOnes as $newOne){
            $customer->payment()->save($newOne);
        }

        return back();
    }
function updateAddress(Customer $customer ){
        $address = \App\Address::find(request()->get('address'));
        $customer->address()->associate($address)->save();
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

