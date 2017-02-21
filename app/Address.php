<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Address extends Model
{
    protected $primaryKey = "address_id";

    protected $table = "address";

    protected $fillable = ["address_id", "address", "address2", "district", "city_id", "postal_code", "phone", "last_update",  ];

        function customer(){ 
        return $this->hasMany('App\Customer');
    }

    function staff(){ 
        return $this->hasMany('App\Staff');
    }

    function store(){ 
        return $this->hasMany('App\Store');
    }

    function city(){ 
        return $this->belongsTo('App\City');
    }

 
    function getAddressAttribute($value){

        if(strlen($value) > 40 && session('mutate', 'none') == '1') {
            return substr($value, 0, 40)."...";
        }

        return $value;
    } function getAddress2Attribute($value){

        if(strlen($value) > 40 && session('mutate', 'none') == '1') {
            return substr($value, 0, 40)."...";
        }

        return $value;
    } function getDistrictAttribute($value){

        if(strlen($value) > 40 && session('mutate', 'none') == '1') {
            return substr($value, 0, 40)."...";
        }

        return $value;
    } function getPostalCodeAttribute($value){

        if(strlen($value) > 40 && session('mutate', 'none') == '1') {
            return substr($value, 0, 40)."...";
        }

        return $value;
    } function getPhoneAttribute($value){

        if(strlen($value) > 40 && session('mutate', 'none') == '1') {
            return substr($value, 0, 40)."...";
        }

        return $value;
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

    function getStorePaginatedAttribute(){
        $store = $this->store();
        if(session("keyword", "none") != "none"){
            $key = "%".session('keyword','')."%";
            $store->where('address->address', 'like', $key)
             ;

        }

        if(session("sortKey", "none") == "none" or !Schema::hasColumn("store", session("sortKey", "none")))
            return $store->paginate(20)->appends(array("tab" => "store"));

        return $store->orderBy(session("sortKey", "address->address"), session("sortOrder", "asc"))->paginate(20)->appends(array("tab" => "store"));

    }

    
 
    public function hasAttribute($attr)
    {
        return array_key_exists($attr, $this->attributes);
    }

}

?>