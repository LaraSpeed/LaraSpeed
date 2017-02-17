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

 
    function getCountryAttribute($value){

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