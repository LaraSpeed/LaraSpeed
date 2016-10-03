<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {
    public function up()
    {
         Schema::table('film', function(Blueprint $table) {
            $table->integer('language_id')->unsigned()->index();
            $table->foreign('language_id')->references('id')->on('language')->onDelete('cascade')->onUpdate('cascade');
$table->integer('film_category_id')->unsigned()->index();
            $table->foreign('film_category_id')->references('id')->on('film_category')->onDelete('cascade')->onUpdate('cascade');
         });
    }
    public function down()
    {
         Schema::table('film', function(Blueprint $table) {
           $table->dropForeign('film_language_id_foreign');
           $table->dropForeign('film_film_category_id_foreign');
        });

    }
}