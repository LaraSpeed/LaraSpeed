<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {
    public function up()
    {
                Schema::table('film', function(Blueprint $table) {
$table->integer('director_id')->unsigned()->index()->nullable();
            $table->foreign('director_id')->references('id')->on('director')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('director', function(Blueprint $table) {

        });

    }
    public function down()
    {
                Schema::table('film', function(Blueprint $table) {
                $table->dropForeign('film_director_id_foreign');
        });

        Schema::table('director', function(Blueprint $table) {
    
        });


    }
}