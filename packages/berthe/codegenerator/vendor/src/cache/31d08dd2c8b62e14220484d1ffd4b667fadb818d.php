
namespace <?php echo $__env->yieldContent('namespace'); ?>;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class <?php echo $__env->yieldContent('modelName'); ?> extends Model
{
    protected $primaryKey = "<?php echo $__env->yieldContent('col_id'); ?>";

    protected $table = "<?php echo $__env->yieldContent('tableName'); ?>";

    protected $fillable = [<?php echo $__env->yieldContent('attributs'); ?>];

    <?php echo $__env->yieldContent('relations'); ?>

    <?php echo $__env->yieldContent('accessors'); ?>



    public function hasAttribute($attr)
    {
        return array_key_exists($attr, $this->attributes);
    }

    /**
    * The storage format of the model's date columns.
    *
    * @var  string
    */
    //protected $dateFormat = 'Y-m-d'; //H:i:s

    /**
    * The attributes that should be mutated to dates.
    *
    * @var  array
    */
    //protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}

?>