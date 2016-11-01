<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $primaryKey = "language_id";

    protected $table = "language";

    protected $fillable = ["language_id", "name", "last_update",  ];

    function film(){ 
        return $this->hasMany('App\Film');
    }

 

    function getNameAttribute($value){

        if(strlen($value) > 40 ) {
            return substr($value, 0, 40)."...";
        }

        return $value;
    }  
}

?>