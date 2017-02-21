<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Payment extends Model
{
    protected $primaryKey = "payment_id";

    protected $table = "payment";

    protected $fillable = ["payment_id", "customer_id", "rental_id", "amount", "payment_date",  ];

        function rental(){ 
        return $this->belongsTo('App\Rental');
    }

    function customer(){ 
        return $this->belongsTo('App\Customer');
    }

    function staff(){ 
        return $this->belongsTo('App\Staff');
    }

 
     function setPaymentDateAttribute($value){

        $val = explode("-", $value);

        if(count($val) < 2)
            $val = explode("/", $value);

        $value = "$val[2]-$val[0]-$val[1]";
        $this->attributes['payment_date'] = date("Y-m-d", strtotime($value));

    }

    function getPaymentDateAttribute($value){

        return date("m-d-Y", strtotime($value));

    }  
    
    
    
 
    public function hasAttribute($attr)
    {
        return array_key_exists($attr, $this->attributes);
    }

}

?>