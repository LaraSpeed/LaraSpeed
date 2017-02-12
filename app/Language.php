<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Language extends Model
{
    protected $primaryKey = "language_id";

    protected $table = "language";

    protected $fillable = ["language_id", "name", "last_update",  ];

        function film(){ 
        return $this->hasMany('App\Film');
    }

 
    function getNameAttribute($value){

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