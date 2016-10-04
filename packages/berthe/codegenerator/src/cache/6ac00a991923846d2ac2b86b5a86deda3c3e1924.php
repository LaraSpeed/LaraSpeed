
namespace <?php echo $__env->yieldContent('namespace'); ?>;

use Illuminate\Database\Eloquent\Model;

class <?php echo $__env->yieldContent('modelName'); ?> extends Model
{
    protected $primaryKey = "<?php echo $__env->yieldContent('col_id'); ?>";

    protected $table = "<?php echo $__env->yieldContent('tableName'); ?>";

    protected $fillable = [<?php echo $__env->yieldContent('attributs'); ?>];

    <?php echo $__env->yieldContent('relations'); ?>
}

?>