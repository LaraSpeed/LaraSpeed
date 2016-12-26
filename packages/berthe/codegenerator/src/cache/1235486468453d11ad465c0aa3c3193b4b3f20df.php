
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

}

?>