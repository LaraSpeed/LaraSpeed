<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Actor extends Model
{
    protected $primaryKey = "actor_id";

    protected $table = "actor";

    protected $fillable = ["actor_id", "first_name", "last_name", "last_update",  ];

        function film(){ 
        return $this->belongsToMany('App\Film');
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
    }  
    
 
    public function hasAttribute($attr)
    {
        return array_key_exists($attr, $this->attributes);
    }

}

?>