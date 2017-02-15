<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {
    public function up()
    {
                Schema::table('actor', function(Blueprint $table) {

        });

        Schema::table('film', function(Blueprint $table) {
$table->integer('language_id')->unsigned()->index()->nullable();
            $table->foreign('language_id')->references('id')->on('language')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('language', function(Blueprint $table) {

        });

        Schema::table('category', function(Blueprint $table) {

        });

    }
    public function down()
    {
                Schema::table('actor', function(Blueprint $table) {
    
        });

        Schema::table('film', function(Blueprint $table) {
                $table->dropForeign('film_language_id_foreign');
        });

        Schema::table('language', function(Blueprint $table) {
    
        });

        Schema::table('category', function(Blueprint $table) {
    
        });


    }
}