<?php 
namespace  App ;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class  City  extends Model
{
    protected $primaryKey = "city_id";

    protected $table = "city";

    protected $fillable = [ "city_id", "city", "country_id", "last_update",   ];

     function address(){ 
    return $this->hasMany('App\Address');
}

    function country(){ 
    return $this->belongsTo('App\Country');
}

  
     function getCityAttribute($value){

        if(strlen($value) > 40 && session('mutate', 'none') == '1') {
            return substr($value, 0, 40)."...";
        }

        return $value;
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