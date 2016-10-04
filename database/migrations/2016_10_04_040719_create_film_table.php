<?php 
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('film', function (Blueprint $table) {
            //$table->increments('id');
            $table->increments('film_id');
$table->string('title', 255);
$table->text('description');
$table->char('release_year', 4);
$table->tinyInteger('original_language_id');
$table->tinyInteger('rental_duration');
$table->decimal('rental_rate', 4, 2);
$table->smallInteger('length');
$table->decimal('replacement_cost', 5, 2);
$table->enum('rating', array("G","PG","PG-1","R","NC-17",));
$table->addColumn('set', 'special_features', array("Trailers","Commentaries","Deleted Scenes","Behind The Scenes",));
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
        Schema::drop('film');
    }
}

?>