<?php
namespace App;
use Berthe\Codegenerator\Core\CallGenerator;
use Berthe\Codegenerator\Core\MCD;

/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 01/09/16
 * Time: 05:20 م
 */

class GeneratorCode  extends CallGenerator {

    public function getSite(){

        $mcd = new MCD();

        $mcd->table("actor")
                ->smallInteger("actor_id", true)
                ->string("first_name", 30, true)
                ->string("last_name", 30, true)
                ->timeStamp("last_update")
                ->belongsToMany("film", "Films where the Actor played")
                ->end()

            ->table("film")
                ->increments("film_id")
                ->smallInteger("language_id")
                ->string("title", 255, true, true)
                ->text("description", true, true)
                ->integer("release_year", true, true)
                ->smallInteger("original_language_id")
                ->tinyInteger("rental_duration", true, false, "days")
                ->decimal("rental_rate", 4, 2, true, true, "$")
                ->tinyInteger("length", true, true, "minutes")
                ->decimal("replacement_cost", 5, 2, false, false, "$")
                ->enum("rating", array('G', 'PG', 'PG-1', 'R', 'NC-17'))
                //This May be Set
                ->set("special_features", array('Trailers', 'Commentaries', 'Deleted Scenes', 'Behind The Scenes'))
                ->timeStamp("last_update")
                ->belongsTo("language")
                ->belongsToMany("category", "Categories associated to this film")
                ->belongsToMany("actor", "Actors that played in the Film")
                ->belongsToMany("store", "Stores where the Film is inventoried") //=> Pivot => inventory
                ->end()

            ->table("language")
                ->increments("language_id")
                ->string("name", 20, true)
                ->timeStamp("last_update")
                ->hasMany("film", "Films in the Language")
                ->end()

            ->table("category")
                ->increments("category_id")
                ->string("name", 25, true)
                ->timeStamp("last_update")
                ->belongsToMany("film", "Films related to the Category")
                ->end()

            ->table("customer")
                ->increments("customer_id")
                ->smallInteger("store_id")
                ->string("first_name", 25, true)
                ->string("last_name", 45, true)
                ->string("email", 50, true)
                ->smallInteger("address_id")
                ->boolean("active", false, false)
                ->date("create_date", true)
                ->timeStamp("last_update")
                ->hasMany("payment", "Customer's Payments")
                ->hasMany("rental", "Customer's Rentals")
                ->belongsTo("address")
                ->belongsTo("store")
                ->end()

            ->table("rental")
                ->increments("rental_id")
                ->date("rental_date", true, true)
                ->smallInteger("inventory_id")
                ->smallInteger("customer_id")
                ->date("return_date", true, true)
                ->smallInteger("staff_id")
                ->timeStamp("last_update")
                ->hasMany("payment", "Rental's Payments")
                ->belongsTo("staff")
                ->belongsTo("customer")
                ->end()

            ->table("payment")
                ->increments("payment_id")
                ->smallInteger("customer_id")
                ->smallInteger("rental_id")
                ->decimal("amount", 4, 4, true, true, "$")
                ->date("payment_date", true, true)
                ->belongsTo("rental")
                ->belongsTo("customer")
                ->belongsTo("staff")
                ->end()

            ->table("address")
                ->increments("address_id")
                ->string("address", 50, true)
                ->string("address2", 50)
                ->string("district", 20, true)
                ->smallInteger("city_id")
                ->string("postal_code", 10, true)
                ->string("phone", 20, true)
                ->timeStamp("last_update")
                ->hasMany("customer", "Customers at the Address")
                ->hasMany("staff", "Staffs at the Address")
                ->hasMany("store", "Stores at the Address")
                ->belongsTo("city")
                ->end()

            ->table("city")
                ->increments("city_id")
                ->string("city", 50, true)
                ->smallInteger("country_id")
                ->timeStamp("last_update")
                ->hasMany("address", "Addresses in the city")
                ->belongsTo("country")
                ->end()

            ->table("country")
                ->increments("country_id", true)
                ->string("country", 50, true)
                ->timeStamp("last_update")
                ->hasMany("city", "Cities in the Country")
                ->end()

            ->table("store")
                ->increments("store_id", true)
                ->smallInteger("manager_staff_id", true, true)
                ->smallInteger("address_id", true, true)
                ->belongsTo("address")
                ->hasMany("staff", "Staffs in the Store")
                ->belongsToMany("film", "Films in the Store")
                ->hasMany("customer")
                ->end()

            ->table("staff")
                ->smallInteger("staff_id", true)
                ->string("first_name", 45, true)
                ->string("last_name", 15, true)
                ->smallInteger("address_id")
                //->blob("picture")
                ->string("email", 50, true)
                ->smallInteger("store_id", false, false)
                ->tinyInteger("active", false, false)
                ->string("username", 16, true)
                ->string("password", 40, true, false)
                ->timeStamp("last_update")
                ->hasMany("rental", "Rentals make by the Staff")
                ->hasMany("payment", "Payments received by the Staff")
                ->belongsTo("address")
                ->belongsTo("store")
                ->end()

            ->table("delivery")
                ->increments("id")
                ->string("identifiant", 25, true)
                ->date("date", true)
                ->longText("articles", false)
                ->end();

        //Set Additional Information
        parent::setRoutes($mcd->getRoutes());
        parent::setPivots($mcd->getPivots());
        parent::setHoverMessages($mcd->getHoversMessages());
        
        return $mcd->getSite();
    }

    public $configs = array(

        //Laravel Version for which the code should be generated.
        "version" => "5.3",

        //Attribute which should be displayed for each tables when needed one Attribute
        "displayAttributes" => array(
            "actor" => "first_name",
            "film" => "title",
            "language" => "name",
            "category" => "name",
            "customer" => "first_name",
            "rental" => "rental_date",
            "address" => "address",
            "city" => "city",
            "country" => "country",
            "payment" => "payment_date",
            "staff" => "first_name",
            "store" => "address->address",
            "delivery" => "identifiant",
            "users" => "name"
        ),

        "tablePluralForm" => array(
            "actor" => "actors",
            "film" => "films",
            "language" => "languages",
            "category" => "categories",
            "inventory" => "inventories",
            "customer" => "customers",
            "rental" => "rentals",
            "address" => "addresses",
            "city" => "cities",
            "country" => "countries",
            "payment" => "payments",
            "staff" => "staffs",
            "store" => "stores",
            "delivery" => "deliveries",
            "users" => "users"
        ),

        "sidebarIcons" => array(
            "actor" => "fa fa-play",
            "film" => "fa fa-film",
            "language" => "fa fa-language",
            "category" => "fa fa-tags",
            "delivery" => "fa fa-gift",
            "users" => "fa fa-user",
            "inventory" => "fa fa-archive",
            "customer" => "fa fa-users",
            "rental" => "fa fa-industry",
            "address" => "fa fa-hotel",
            "payment" => "fa fa-paypal",
            "city" => "fa fa-home",
            "country" => "fa fa-home",
            "staff" => "fa fa-user",
            "store" => "fa fa-amazon"
        ),
    );

}
