<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Customer extends Model
{
    protected $primaryKey = "customer_id";

    protected $table = "customer";

    protected $fillable = ["customer_id", "store_id", "first_name", "last_name", "email", "address_id", "active", "create_date", "last_update",  ];

        function inventory(){ 
        return $this->belongsToMany('App\Inventory', 'rental');
    }

    function payment(){ 
        return $this->hasMany('App\Payment');
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
    } function setCreateDateAttribute($value){

        $val = explode("-", $value);

        if(count($val) < 2)
            $val = explode("/", $value);

        $value = "$val[2]-$val[0]-$val[1]";
        $this->attributes['create_date'] = date("Y-m-d", strtotime($value));

    }

    function getCreateDateAttribute($value){

        return date("m-d-Y", strtotime($value));

    }  
    
    
    
 
    public function hasAttribute($attr)
    {
        return array_key_exists($attr, $this->attributes);
    }

}

?>