<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

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

        if(strlen($value) > 40 && session('mutate', 'none') == '1') {
            return substr($value, 0, 40)."...";
        }

        return $value;
    } function getDescriptionAttribute($value){

        if(strlen($value) > 40 && session('mutate', 'none') == '1') {
            return substr($value, 0, 40)."...";
        }

        return $value;
    }       
    
    function getCategoryPaginatedAttribute(){
        $category = $this->category();
        if(session("keyword", "none") != "none"){
            $key = "%".session('keyword','')."%";
            $category->where('name', 'like', $key)
             ;

        }

        if(session("sortKey", "none") == "none" or !Schema::hasColumn("category", session("sortKey", "none")))
            return $category->paginate(20)->appends(array("tab" => "category"));

        return $category->orderBy(session("sortKey", "name"), session("sortOrder", "asc"))->paginate(20)->appends(array("tab" => "category"));

    }

 
    public function hasAttribute($attr)
    {
        return array_key_exists($attr, $this->attributes);
    }

}

?>