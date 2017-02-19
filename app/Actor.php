<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Actor extends Model
{
    protected $primaryKey = "actor_id";

    protected $table = "actor";

    protected $fillable = ["actor_id", "first_name", "last_name", "last_update",  ];

        function film(){ 
        return $this->belongsToMany('App\Film');
    }

 
    function getFirstNameAttribute($value){

        if(strlen($value) > 40 && session('mutate', 'none') == '1') {
            return substr($value, 0, 40)."...";
        }

        return $value;
    } function getLastNameAttribute($value){

        if(strlen($value) > 40 && session('mutate', 'none') == '1') {
            return substr($value, 0, 40)."...";
        }

        return $value;
    }  
    function getFilmPaginatedAttribute(){
        $film = $this->film();
        if(session("keyword", "none") != "none"){
            $key = "%".session('keyword','')."%";
            $film->where('title', 'like', $key)
               ->orWhere('description', 'like', $key)
          ->orWhere('release_year', 'like', $key)
           ->orWhere('rental_duration', 'like', $key)
          ->orWhere('rental_rate', 'like', $key)
          ->orWhere('length', 'like', $key)
          ->orWhere('replacement_cost', 'like', $key)
           ;

        }

        if(session("sortKey", "none") == "none" or !Schema::hasColumn("film", session("sortKey", "none")))
            return $film->paginate(20)->appends(array("tab" => "film"));

        return $film->orderBy(session("sortKey", "title"), session("sortOrder", "asc"))->paginate(20)->appends(array("tab" => "film"));

    }

 
    public function hasAttribute($attr)
    {
        return array_key_exists($attr, $this->attributes);
    }

}

?>