<?php 
namespace  App ;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class  Delivery  extends Model
{
    protected $primaryKey = "id";

    protected $table = "delivery";

    protected $fillable = [ "id", "identifiant", "date", "articles",   ];

      
     function getIdentifiantAttribute($value){

        if(strlen($value) > 40 && session('mutate', 'none') == '1') {
            return substr($value, 0, 40)."...";
        }

        return $value;
    } function setDateAttribute($value){

        $val = explode("-", $value);

        if(count($val) < 2)
            $val = explode("/", $value);

        $value = "$val[2]-$val[0]-$val[1]";
        $this->attributes['date'] = date("Y-m-d", strtotime($value));

    }

    function getDateAttribute($value){

        return date("m-d-Y", strtotime($value));

    } function getArticlesAttribute($value){

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