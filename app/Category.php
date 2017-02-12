<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Category extends Model
{
    protected $primaryKey = "category_id";

    protected $table = "category";

    protected $fillable = ["category_id", "name", "last_update",  ];

        function film(){ 
        return $this->belongsToMany('App\Film', 'film_category');
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