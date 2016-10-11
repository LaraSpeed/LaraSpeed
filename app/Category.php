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

 
}

?>