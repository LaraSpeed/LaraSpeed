<?php 
namespace  App ;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class  Customer  extends Model
{
    protected $primaryKey = "customer_id";

    protected $table = "customer";

    protected $fillable = [ "customer_id", "store_id", "first_name", "last_name", "email", "address_id", "active", "create_date", "last_update",   ];

     function payment(){ 
        return $this->hasManyThrough('App\Payment', 'App\Rental');
    }

    function rental(){ 
    return $this->hasMany('App\Rental');
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
    }  function setCreateDateAttribute($value){

        $val = explode("-", $value);

        if(count($val) < 2)
            $val = explode("/", $value);

        $value = "$val[2]-$val[0]-$val[1]";
        $this->attributes['create_date'] = date("Y-m-d", strtotime($value));

    }

    function getCreateDateAttribute($value){

        return date("m-d-Y", strtotime($value));

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

    
    
  
    public function hasAttribute($attr)
    {
        return array_key_exists($attr, $this->attributes);
    }

}

?>