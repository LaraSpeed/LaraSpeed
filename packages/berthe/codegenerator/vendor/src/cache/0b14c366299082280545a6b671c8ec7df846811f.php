use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class <?php echo $__env->yieldContent('schemaClassName'); ?> extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('<?php echo $__env->yieldContent('createTable'); ?>', function (Blueprint $table) {

            <?php echo $__env->yieldContent('fields'); ?>
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('<?php echo $__env->yieldContent('dropTable'); ?>');
    }
}

?>