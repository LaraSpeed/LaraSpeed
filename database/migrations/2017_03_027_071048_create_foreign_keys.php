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
            $table->foreign('language_id')->references('language_id')->on('language')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('language', function(Blueprint $table) {

        });

        Schema::table('category', function(Blueprint $table) {

        });

        Schema::table('customer', function(Blueprint $table) {
$table->integer('address_id')->unsigned()->index()->nullable();
            $table->foreign('address_id')->references('address_id')->on('address')->onDelete('cascade')->onUpdate('cascade');$table->integer('store_id')->unsigned()->index()->nullable();
            $table->foreign('store_id')->references('store_id')->on('store')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('rental', function(Blueprint $table) {
$table->integer('staff_id')->unsigned()->index()->nullable();
            $table->foreign('staff_id')->references('staff_id')->on('staff')->onDelete('cascade')->onUpdate('cascade');$table->integer('customer_id')->unsigned()->index()->nullable();
            $table->foreign('customer_id')->references('customer_id')->on('customer')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('payment', function(Blueprint $table) {
$table->integer('rental_id')->unsigned()->index()->nullable();
            $table->foreign('rental_id')->references('rental_id')->on('rental')->onDelete('cascade')->onUpdate('cascade');$table->integer('customer_id')->unsigned()->index()->nullable();
            $table->foreign('customer_id')->references('customer_id')->on('customer')->onDelete('cascade')->onUpdate('cascade');$table->integer('staff_id')->unsigned()->index()->nullable();
            $table->foreign('staff_id')->references('staff_id')->on('staff')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('address', function(Blueprint $table) {
$table->integer('city_id')->unsigned()->index()->nullable();
            $table->foreign('city_id')->references('city_id')->on('city')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('city', function(Blueprint $table) {
$table->integer('country_id')->unsigned()->index()->nullable();
            $table->foreign('country_id')->references('country_id')->on('country')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('country', function(Blueprint $table) {

        });

        Schema::table('store', function(Blueprint $table) {
$table->integer('address_id')->unsigned()->index()->nullable();
            $table->foreign('address_id')->references('address_id')->on('address')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('staff', function(Blueprint $table) {
$table->integer('address_id')->unsigned()->index()->nullable();
            $table->foreign('address_id')->references('address_id')->on('address')->onDelete('cascade')->onUpdate('cascade');$table->integer('store_id')->unsigned()->index()->nullable();
            $table->foreign('store_id')->references('store_id')->on('store')->onDelete('cascade')->onUpdate('cascade');
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

        Schema::table('customer', function(Blueprint $table) {
                $table->dropForeign('customer_address_id_foreign');            $table->dropForeign('customer_store_id_foreign');
        });

        Schema::table('rental', function(Blueprint $table) {
                $table->dropForeign('rental_staff_id_foreign');            $table->dropForeign('rental_customer_id_foreign');
        });

        Schema::table('payment', function(Blueprint $table) {
                $table->dropForeign('payment_rental_id_foreign');            $table->dropForeign('payment_customer_id_foreign');            $table->dropForeign('payment_staff_id_foreign');
        });

        Schema::table('address', function(Blueprint $table) {
                $table->dropForeign('address_city_id_foreign');
        });

        Schema::table('city', function(Blueprint $table) {
                $table->dropForeign('city_country_id_foreign');
        });

        Schema::table('country', function(Blueprint $table) {
    
        });

        Schema::table('store', function(Blueprint $table) {
                $table->dropForeign('store_address_id_foreign');
        });

        Schema::table('staff', function(Blueprint $table) {
                $table->dropForeign('staff_address_id_foreign');            $table->dropForeign('staff_store_id_foreign');
        });


    }
}