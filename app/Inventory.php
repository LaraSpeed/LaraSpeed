<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Inventory extends Model
{
    protected $primaryKey = "inventory_id";

    protected $table = "inventory";

    protected $fillable = ["inventory_id", "film_id", "store_id", "last_update",  ];

        function film(){ 
        return $this->belongsTo('App\Film');
    }

    function store(){ 
        return $this->belongsTo('App\Store');
    }

 
     
    
    
 
    public function hasAttribute($attr)
    {
        return array_key_exists($attr, $this->attributes);
    }

}

?>