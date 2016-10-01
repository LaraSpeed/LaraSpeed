<?php 
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActeurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('acteur', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
             $table->integer('age');             
            $table->integer('film_id')->unsigned()->index();
            $table->foreign('film_id')->references('id')->on('film')->onDelete('cascade')->onUpdate('cascade');

        });
    }
    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('acteur');
    }
}

?>