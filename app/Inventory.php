<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Inventory extends Model
{
    protected $primaryKey = "inventory_id";

    protected $table = "inventory";

    protected $fillable = ["inventory_id", "film_id", "store_id", "last_update",  ];

        function customer(){ 
        return $this->belongsToMany('App\Customer', 'inventory');
    }

 
     
    function getCustomerPaginatedAttribute(){
        $customer = $this->customer();
        if(session("keyword", "none") != "none"){
            $key = "%".session('keyword','')."%";
            $customer->where('first_name', 'like', $key)
               ->orWhere('last_name', 'like', $key)
          ->orWhere('email', 'like', $key)
           ->orWhere('active', 'like', $key)
          ->orWhere('create_date', 'like', $key)
         ;

        }

        if(session("sortKey", "none") == "none" or !Schema::hasColumn("customer", session("sortKey", "none")))
            return $customer->paginate(20)->appends(array("tab" => "customer"));

        return $customer->orderBy(session("sortKey", "first_name"), session("sortOrder", "asc"))->paginate(20)->appends(array("tab" => "customer"));

    }

 
    public function hasAttribute($attr)
    {
        return array_key_exists($attr, $this->attributes);
    }

}

?>