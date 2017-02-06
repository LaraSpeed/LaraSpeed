<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Director extends Model
{
    protected $primaryKey = "id";

    protected $table = "director";

    protected $fillable = ["id", "name", "birth", "bio",  ];

        function film(){ 
        return $this->hasMany('App\Film');
    }

 
    function getNameAttribute($value){

        if(strlen($value) > 40 && session('mutate', 'none') == '1') {
            return substr($value, 0, 40)."...";
        }

        return $value;
    } function setBirthAttribute($value){

        $val = explode("-", $value);

        if(count($val) < 2)
            $val = explode("/", $value);

        $value = "$val[2]-$val[0]-$val[1]";
        $this->attributes['birth'] = date("Y-m-d", strtotime($value));

    }

    function getBirthAttribute($value){

        return date("m-d-Y", strtotime($value));

    } function getBioAttribute($value){

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
          ->orWhere('price', 'like', $key)
          ->orWhere('famous', 'like', $key)
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