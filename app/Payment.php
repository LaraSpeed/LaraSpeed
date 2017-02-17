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

 
      
    
    
 
    public function hasAttribute($attr)
    {
        return array_key_exists($attr, $this->attributes);
    }

}

?>