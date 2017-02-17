<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class City extends Model
{
    protected $primaryKey = "city_id";

    protected $table = "city";

    protected $fillable = ["city_id", "city", "country_id", "last_update",  ];

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
    
    
 
    public function hasAttribute($attr)
    {
        return array_key_exists($attr, $this->attributes);
    }

}

?>