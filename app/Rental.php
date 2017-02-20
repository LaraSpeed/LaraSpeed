<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Rental extends Model
{
    protected $primaryKey = "rental_id";

    protected $table = "rental";

    protected $fillable = ["rental_id", "rental_date", "inventory_id", "customer_id", "return_date", "staff_id", "last_update",  ];

        function payment(){ 
        return $this->hasMany('App\Payment');
    }

    function staff(){ 
        return $this->belongsTo('App\Staff');
    }

 
    function setReturnDateAttribute($value){

        $val = explode("-", $value);

        if(count($val) < 2)
            $val = explode("/", $value);

        $value = "$val[2]-$val[0]-$val[1]";
        $this->attributes['return_date'] = date("Y-m-d", strtotime($value));

    }

    function getReturnDateAttribute($value){

        return date("m-d-Y", strtotime($value));

    }  
    function getPaymentPaginatedAttribute(){
        $payment = $this->payment();
        if(session("keyword", "none") != "none"){
            $key = "%".session('keyword','')."%";
            $payment->where('amount', 'like', $key)
               ;

        }

        if(session("sortKey", "none") == "none" or !Schema::hasColumn("payment", session("sortKey", "none")))
            return $payment->paginate(20)->appends(array("tab" => "payment"));

        return $payment->orderBy(session("sortKey", "amount"), session("sortOrder", "asc"))->paginate(20)->appends(array("tab" => "payment"));

    }

    
 
    public function hasAttribute($attr)
    {
        return array_key_exists($attr, $this->attributes);
    }

}

?>