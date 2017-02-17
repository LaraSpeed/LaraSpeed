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

 
     
    
    
 
    public function hasAttribute($attr)
    {
        return array_key_exists($attr, $this->attributes);
    }

}

?>