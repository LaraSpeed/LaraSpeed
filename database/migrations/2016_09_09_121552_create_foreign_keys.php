<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {
    public function up()
    {
         Schema::table('acteur', function(Blueprint $table) {
            $table->integer('film_id')->unsigned()->index();
            $table->foreign('film_id')->references('id')->on('film')->onDelete('cascade')->onUpdate('cascade');
         });
    }
    public function down()
    {
         Schema::table('acteur', function(Blueprint $table) {
           $table->dropForeign('acteur_film_id_foreign');
        });

    }
}