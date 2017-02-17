<?php 
namespace App\Http\Controllers;

use App\Payment;
    use App\Rental;

    use App\Customer;

     
class PaymentController extends Controller {

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
        return view('payment_show', ['payments' => Payment::all()]);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return  Response
    */
    public function create()
    {
        return view('payment');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return  Response
    */
    public function store()
    {
        $data = request()->all();

        $payment = Payment::create([
               "amount" => $data["amount"],
              ]);

        if(request()->exists('rental')){
            $rental = Rental::find(request()->get('rental'));
            $payment->rental()->associate($rental)->save();
         }

         if(request()->exists('customer')){
            $customer = Customer::find(request()->get('customer'));
            $payment->customer()->associate($customer)->save();
         }

      
        return isset($data['carl'])?redirect('/payment'):back();    }

    /**
    * Display the specified resource.
    *
    * @param    Mixed
    * @return  Response
    */
    public function show(Payment $payment )
    {
        request()->session()->forget("mutate");
        $payment->load(array("rental","customer",));
return view('payment_display', compact('payment'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param    Mixed
    * @return  Response
    */
    public function edit(Payment $payment )
    {
        request()->session()->forget("mutate");
        $payment->load(array("rental","customer",));
return view('payment_edit', compact('payment'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param    Mixed
    * @return  Response
    */
    public function update(Payment $payment )
    {
            $data = request()->all();

    $updateFields = array();
               $updateFields["amount"] = $data["amount"];
      
    $payment->update($updateFields);

            if(request()->exists('rental')){
            $rental = \App\Rental::find(request()->get('rental'));
            $payment->rental()->associate($rental)->save();
        }

             if(request()->exists('customer')){
            $customer = \App\Customer::find(request()->get('customer'));
            $payment->customer()->associate($customer)->save();
        }

      



        return back();
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param    Mixed
    * @return  Response
    */
    public function destroy(Payment $payment )
    {
        $payment->delete();         return back();
    }

    /**
    * Load and display related tables.
    * @param    Mixed
    * @return  Response
    */
    public function related(Payment $payment ){

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
        $payment->load(array("rental","customer",));
        return view('payment_related', compact(['payment', 'table']));
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

        $payments = Payment::where('payment_id', 'like', $keyword)
         ->orWhere('payment_id', 'like', $keyword)

         ->orWhere('customer_id', 'like', $keyword)

         ->orWhere('rental_id', 'like', $keyword)

         ->orWhere('amount', 'like', $keyword)

         ->orWhere('payment_date', 'like', $keyword)

        ->paginate(20);

        $payments->setPath("search?keyword=$keyword");
        return view('payment_show', compact('payments'));
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
        $payments = Payment::query();
          if(request()->exists('amount')){
            $payments = $payments->orderBy('amount', $this->getOrder('amount'));
            $path = "amount";
        }else{
            request()->session()->forget("amount");
        }
          $payments = $payments->paginate(20);
        $payments->setPath("sort?$path");
        return view('payment_show', compact('payments'));

    }else{

      if(request()->exists('tab') == 'rental'){

               
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

    function updateRental(Payment $payment ){
        $rental = \App\Rental::find(request()->get('rental'));
        $payment->rental()->associate($rental)->save();
        return back();
    }
function updateCustomer(Payment $payment ){
        $customer = \App\Customer::find(request()->get('customer'));
        $payment->customer()->associate($customer)->save();
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

