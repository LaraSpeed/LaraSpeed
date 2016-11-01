<?php 
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            //$table->increments('id');
                        $table->tinyInteger('category_id');
            $table->string('name', 25);
            $table->timestamp('last_update');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('category');
    }
}

?>