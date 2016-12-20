use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {
    public function up()
    {
        <?php echo $__env->yieldContent('constraints'); ?>
    }
    public function down()
    {
        <?php echo $__env->yieldContent('dropTables'); ?>
    }
}