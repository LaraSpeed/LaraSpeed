<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Store extends Model
{
    protected $primaryKey = "store_id";

    protected $table = "store";

    protected $fillable = ["store_id", "manager_staff_id", "address_id",  ];

        function address(){ 
        return $this->belongsTo('App\Address');
    }

    function staff(){ 
        return $this->hasMany('App\Staff');
    }

    function inventory(){ 
        return $this->hasMany('App\Inventory');
    }

    function customer(){ 
        return $this->hasMany('App\Customer');
    }

 
     
    
    function getStaffPaginatedAttribute(){
        $staff = $this->staff();
        if(session("keyword", "none") != "none"){
            $key = "%".session('keyword','')."%";
            $staff->where('first_name', 'like', $key)
              ->orWhere('last_name', 'like', $key)
           ->orWhere('email', 'like', $key)
           ->orWhere('active', 'like', $key)
          ->orWhere('username', 'like', $key)
          ->orWhere('password', 'like', $key)
         ;

        }

        if(session("sortKey", "none") == "none" or !Schema::hasColumn("staff", session("sortKey", "none")))
            return $staff->paginate(20)->appends(array("tab" => "staff"));

        return $staff->orderBy(session("sortKey", "first_name"), session("sortOrder", "asc"))->paginate(20)->appends(array("tab" => "staff"));

    }

    function getInventoryPaginatedAttribute(){
        $inventory = $this->inventory();
        if(session("keyword", "none") != "none"){
            $key = "%".session('keyword','')."%";
            $inventory->where('store->address->address', 'like', $key)
              ;

        }

        if(session("sortKey", "none") == "none" or !Schema::hasColumn("inventory", session("sortKey", "none")))
            return $inventory->paginate(20)->appends(array("tab" => "inventory"));

        return $inventory->orderBy(session("sortKey", "store->address->address"), session("sortOrder", "asc"))->paginate(20)->appends(array("tab" => "inventory"));

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