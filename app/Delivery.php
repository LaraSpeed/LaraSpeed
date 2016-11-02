<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $primaryKey = "id";

    protected $table = "delivery";

    protected $fillable = ["id", "identifiant", "date", "articles",  ];

    function film(){ 
        return $this->hasOne('App\Film');
    }

 

    function getIdentifiantAttribute($value){

        if(strlen($value) > 40 ) {
            return substr($value, 0, 40)."...";
        }

        return $value;
    } function getDateAttribute($value){

        if(strlen($value) > 40 ) {
            return substr($value, 0, 40)."...";
        }

        return $value;
    } function getArticlesAttribute($value){

        if(strlen($value) > 40 ) {
            return substr($value, 0, 40)."...";
        }

        return $value;
    }  
}

?>