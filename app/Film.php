<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $primaryKey = "film_id";

    protected $table = "film";

    protected $fillable = ["film_id", "language_id", "title", "description", "release_year", "original_language_id", "rental_duration", "rental_rate", "length", "replacement_cost", "rating", "special_features", "last_update",  ];

    function language(){ 
        return $this->belongsTo('App\Language');
    }

function category(){ 
        return $this->belongsToMany('App\Category', 'film_category');
    }

 

    function getTitleAttribute($value){

        if(strlen($value) > 40 ) {
            return substr($value, 0, 40)."...";
        }

        return $value;
    } function getDescriptionAttribute($value){

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