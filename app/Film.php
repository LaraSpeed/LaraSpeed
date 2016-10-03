<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $table = "film";

    protected $fillable = ["film_id", "title", "description", "release_year", "original_language_id", "rental_duration", "rental_rate", "length", "replacement_cost", "rating", "special_features", "last_update",  ];

    function language(){ 
       return $this->belongsTo('App\Language');
    }
function film_category(){ 
       return $this->belongsTo('App\Film_category');
    }
  
}

?>