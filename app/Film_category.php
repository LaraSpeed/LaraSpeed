<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Film_category extends Model
{
    protected $primaryKey = "film_id";

    protected $table = "film_category";

    protected $fillable = ["film_id", "category_id", "last_update",  ];

     
}

?>