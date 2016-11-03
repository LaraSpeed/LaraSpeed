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