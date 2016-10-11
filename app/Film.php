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

 
}

?>