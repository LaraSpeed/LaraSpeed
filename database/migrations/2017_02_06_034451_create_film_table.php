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

                        $table->increments('id');
            $table->string('title');
            $table->longText('description');
            $table->double('price', 4, 2);
            $table->boolean('famous');
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
        Schema::drop('film');
    }
}

?>