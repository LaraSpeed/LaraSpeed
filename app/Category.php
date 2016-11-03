<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = "category_id";

    protected $table = "category";

    protected $fillable = ["category_id", "name", "last_update",  ];



    function film(){ 
        return $this->belongsToMany('App\Film', 'film_category');
    }

 

    function getCategoryIdAttribute($value){

        if(strlen($value) > 40 ) {
            return substr($value, 0, 40)."...";
        }

        return $value;
    } function getNameAttribute($value){

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
    protected $dateFormat = 'Y-m-d'; //H:i:s

    /**
    * The attributes that should be mutated to dates.
    *
    * @var  array
    */
    protected $dates = ['created_at', 'updated_at', 'deleted_at',     ];
}

?>