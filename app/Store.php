<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Store extends Model
{
    protected $primaryKey = "store_id";

    protected $table = "store";

    protected $fillable = ["store_id", "manager_staff_id", "address_id",  ];

    
     

    public function hasAttribute($attr)
    {
        return array_key_exists($attr, $this->attributes);
    }

}

?>