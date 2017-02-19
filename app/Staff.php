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

    function address(){ 
        return $this->belongsTo('App\Address');
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
            $rental->where('customer_id', 'like', $key)
                 ;

        }

        if(session("sortKey", "none") == "none" or !Schema::hasColumn("rental", session("sortKey", "none")))
            return $rental->paginate(20)->appends(array("tab" => "rental"));

        return $rental->orderBy(session("sortKey", "customer_id"), session("sortOrder", "asc"))->paginate(20)->appends(array("tab" => "rental"));

    }

    
 
    public function hasAttribute($attr)
    {
        return array_key_exists($attr, $this->attributes);
    }

}

?>