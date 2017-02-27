<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Country extends Model
{
    protected $primaryKey = "country_id";

    protected $table = "country";

    protected $fillable = ["country_id", "country", "last_update",  ];

        function city(){ 
        return $this->hasMany('App\City');
    }

    function address(){ 
        return $this->hasManyThrough('App\Address', 'App\City');
    }

 
    function getCountryAttribute($value){

        if(strlen($value) > 40 && session('mutate', 'none') == '1') {
            return substr($value, 0, 40)."...";
        }

        return $value;
    }  
    function getCityPaginatedAttribute(){
        $city = $this->city();
        if(session("keyword", "none") != "none"){
            $key = "%".session('keyword','')."%";
            $city->where('city', 'like', $key)
              ;

        }

        if(session("sortKey", "none") == "none" or !Schema::hasColumn("city", session("sortKey", "none")))
            return $city->paginate(20)->appends(array("tab" => "city"));

        return $city->orderBy(session("sortKey", "city"), session("sortOrder", "asc"))->paginate(20)->appends(array("tab" => "city"));

    }

    function getAddressPaginatedAttribute(){
        $address = $this->address();
        if(session("keyword", "none") != "none"){
            $key = "%".session('keyword','')."%";
            $address->where('address', 'like', $key)
              ->orWhere('address2', 'like', $key)
          ->orWhere('district', 'like', $key)
           ->orWhere('postal_code', 'like', $key)
          ->orWhere('phone', 'like', $key)
         ;

        }

        if(session("sortKey", "none") == "none" or !Schema::hasColumn("address", session("sortKey", "none")))
            return $address->paginate(20)->appends(array("tab" => "address"));

        return $address->orderBy(session("sortKey", "address"), session("sortOrder", "asc"))->paginate(20)->appends(array("tab" => "address"));

    }

 
    public function hasAttribute($attr)
    {
        return array_key_exists($attr, $this->attributes);
    }

}

?>