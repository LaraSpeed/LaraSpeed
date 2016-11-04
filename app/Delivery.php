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
    } function setDateAttribute($value){

        $val = explode("-", $value);
        $value = "$val[2]-$val[0]-$val[1]";
        $this->attributes['date'] = date("Y-m-d", strtotime($value));

    }

    function getDateAttribute($value){

        return date("m-d-Y", strtotime($value));

    } function getArticlesAttribute($value){

        if(strlen($value) > 40 ) {
            return substr($value, 0, 40)."...";
        }

        return $value;
    }  


    /**
    * The storage format of the model's date columns.
    *
    * @var  string
    */
    //protected $dateFormat = 'Y-m-d'; //H:i:s

    /**
    * The attributes that should be mutated to dates.
    *
    * @var  array
    */
    //protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}

?>