<?php 
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilm_categoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('film_category', function (Blueprint $table) {
            //$table->increments('id');
            $table->smallInteger('film_id');
$table->tinyInteger('category_id');
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
        Schema::drop('film_category');
    }
}

?>