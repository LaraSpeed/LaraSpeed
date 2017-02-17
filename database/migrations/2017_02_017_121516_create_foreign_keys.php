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

        Schema::table('inventory', function(Blueprint $table) {
$table->integer('film_id')->unsigned()->index()->nullable();
            $table->foreign('film_id')->references('id')->on('film')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('customer', function(Blueprint $table) {
$table->integer('address_id')->unsigned()->index()->nullable();
            $table->foreign('address_id')->references('id')->on('address')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('rental', function(Blueprint $table) {
$table->integer('staff_id')->unsigned()->index()->nullable();
            $table->foreign('staff_id')->references('id')->on('staff')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('payment', function(Blueprint $table) {
$table->integer('rental_id')->unsigned()->index()->nullable();
            $table->foreign('rental_id')->references('id')->on('rental')->onDelete('cascade')->onUpdate('cascade');$table->integer('customer_id')->unsigned()->index()->nullable();
            $table->foreign('customer_id')->references('id')->on('customer')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('address', function(Blueprint $table) {
$table->integer('city_id')->unsigned()->index()->nullable();
            $table->foreign('city_id')->references('id')->on('city')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('city', function(Blueprint $table) {
$table->integer('country_id')->unsigned()->index()->nullable();
            $table->foreign('country_id')->references('id')->on('country')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('country', function(Blueprint $table) {

        });

        Schema::table('staff', function(Blueprint $table) {
$table->integer('address_id')->unsigned()->index()->nullable();
            $table->foreign('address_id')->references('id')->on('address')->onDelete('cascade')->onUpdate('cascade');
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

        Schema::table('inventory', function(Blueprint $table) {
                $table->dropForeign('inventory_film_id_foreign');
        });

        Schema::table('customer', function(Blueprint $table) {
                $table->dropForeign('customer_address_id_foreign');
        });

        Schema::table('rental', function(Blueprint $table) {
                $table->dropForeign('rental_staff_id_foreign');
        });

        Schema::table('payment', function(Blueprint $table) {
                $table->dropForeign('payment_rental_id_foreign');            $table->dropForeign('payment_customer_id_foreign');
        });

        Schema::table('address', function(Blueprint $table) {
                $table->dropForeign('address_city_id_foreign');
        });

        Schema::table('city', function(Blueprint $table) {
                $table->dropForeign('city_country_id_foreign');
        });

        Schema::table('country', function(Blueprint $table) {
    
        });

        Schema::table('staff', function(Blueprint $table) {
                $table->dropForeign('staff_address_id_foreign');
        });


    }
}