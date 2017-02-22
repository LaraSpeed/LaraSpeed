<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Staff extends Model
{
    protected $primaryKey = "staff_id";

    protected $table = "staff";

    protected $fillable = ["staff_id", "first_name", "last_name", "address_id", "email", "store_id", "active", "username", "password", "last_update",  ];

        function rental(){ 
        return $this->hasMany('App\Rental');
    }

    function payment(){ 
        return $this->hasMany('App\Payment');
    }

    function address(){ 
        return $this->belongsTo('App\Address');
    }

    function store(){ 
        return $this->belongsTo('App\Store');
    }

 
    function getFirstNameAttribute($value){

        if(strlen($value) > 40 && session('mutate', 'none') == '1') {
            return substr($value, 0, 40)."...";
        }

        return $value;
    } function getLastNameAttribute($value){

        if(strlen($value) > 40 && session('mutate', 'none') == '1') {
            return substr($value, 0, 40)."...";
        }

        return $value;
    } function getEmailAttribute($value){

        if(strlen($value) > 40 && session('mutate', 'none') == '1') {
            return substr($value, 0, 40)."...";
        }

        return $value;
    }  function getUsernameAttribute($value){

        if(strlen($value) > 40 && session('mutate', 'none') == '1') {
            return substr($value, 0, 40)."...";
        }

        return $value;
    } function getPasswordAttribute($value){

        if(strlen($value) > 40 && session('mutate', 'none') == '1') {
            return substr($value, 0, 40)."...";
        }

        return $value;
    }  
    function getRentalPaginatedAttribute(){
        $rental = $this->rental();
        if(session("keyword", "none") != "none"){
            $key = "%".session('keyword','')."%";
            $rental->where('rental_date', 'like', $key)
                ->orWhere('return_date', 'like', $key)
          ;

        }

        if(session("sortKey", "none") == "none" or !Schema::hasColumn("rental", session("sortKey", "none")))
            return $rental->paginate(20)->appends(array("tab" => "rental"));

        return $rental->orderBy(session("sortKey", "rental_date"), session("sortOrder", "asc"))->paginate(20)->appends(array("tab" => "rental"));

    }

    function getPaymentPaginatedAttribute(){
        $payment = $this->payment();
        if(session("keyword", "none") != "none"){
            $key = "%".session('keyword','')."%";
            $payment->where('payment_date', 'like', $key)
               ->orWhere('amount', 'like', $key)
         ;

        }

        if(session("sortKey", "none") == "none" or !Schema::hasColumn("payment", session("sortKey", "none")))
            return $payment->paginate(20)->appends(array("tab" => "payment"));

        return $payment->orderBy(session("sortKey", "payment_date"), session("sortOrder", "asc"))->paginate(20)->appends(array("tab" => "payment"));

    }

    
    
 
    public function hasAttribute($attr)
    {
        return array_key_exists($attr, $this->attributes);
    }

}

?>