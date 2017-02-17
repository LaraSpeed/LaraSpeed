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
    
    
    
 
    public function hasAttribute($attr)
    {
        return array_key_exists($attr, $this->attributes);
    }

}

?>