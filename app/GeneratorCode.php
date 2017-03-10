<?php
namespace App;
use Berthe\Codegenerator\Core\ACL;
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
                ->string("first_name", 30)
                    ->inList()
                    ->mandatory()
                ->string("last_name", 30)
                    ->mandatory()
                ->timeStamp("last_update")
                ->belongsToMany("film")
                    ->doc("Films where the Actor played")
                ->end()

            ->table("film")
                ->increments("film_id")
                ->smallInteger("id_language")
                ->string("title", 255)
                    ->inList()
                    ->mandatory()
                ->text("description")
                    ->inList()
                    ->mandatory()
                ->integer("release_year")
                    ->inList()
                    ->mandatory()
                ->smallInteger("original_language_id")
                ->tinyInteger("rental_duration")
                    ->inList()
                    ->mandatory()
                    ->unit("days")
                ->decimal("rental_rate", 4, 2)
                    ->inList()
                    ->mandatory()
                    ->unit("$")
                ->tinyInteger("length")
                    ->inList()
                    ->mandatory()
                    ->unit("minutes")
                ->decimal("replacement_cost", 5, 2)
                    ->inList(false)
                    ->mandatory(false)
                    ->unit("$")
                ->enum("rating", array('G', 'PG', 'PG-1', 'R', 'NC-17'))
                //This May be Set
                ->set("special_features", array('Trailers', 'Commentaries', 'Deleted Scenes', 'Behind The Scenes'))
                ->timeStamp("last_update")
                ->belongsTo("language" , "id_language", "language_id")
                ->belongsToMany("category")
                    ->doc("Categories associated to this film")
                ->belongsToMany("actor")
                    ->doc("Actors that played in the Film")
                ->belongsToMany("store")
                    ->doc("Stores where the Film is inventoried")
                ->end()

            ->table("language")
                ->increments("language_id")
                ->string("name", 20)
                    ->mandatory()
                ->timeStamp("last_update")
                ->hasMany("film" ,"id_language")
                    ->doc("Films in the Language")
                ->end()

            ->table("category")
                ->increments("category_id")
                ->string("name", 25)
                    ->mandatory()
                ->timeStamp("last_update")
                ->belongsToMany("film")
                    ->doc("Films related to the Category")
                ->end()

            ->table("customer")
                ->increments("customer_id")
                ->smallInteger("store_id")
                ->string("first_name", 25)
                    ->mandatory()
                ->string("last_name", 45)
                    ->mandatory()
                ->string("email", 50)
                    ->mandatory()
                ->smallInteger("address_id")
                ->boolean("active")
                    ->inList(false)
                    ->mandatory(false)
                ->date("create_date")
                    ->inList()
                    ->mandatory()
                ->timeStamp("last_update")
                ->hasManyThrough("payment", "rental")
                    ->doc("Customer's Payments")
                ->hasMany("rental")
                    ->doc("Customer's Payments")
                ->belongsTo("address")
                ->belongsTo("store")
                ->end()

            ->table("rental")
                ->increments("rental_id")
                ->date("rental_date")
                    ->inList()
                    ->mandatory()
                ->smallInteger("inventory_id")
                ->smallInteger("customer_id")
                ->date("return_date")
                    ->inList()
                    ->mandatory()
                ->smallInteger("staff_id")
                ->timeStamp("last_update")
                ->hasMany("payment")
                    ->doc("Rental's Payments")
                ->belongsTo("staff")
                ->belongsTo("customer")
                ->end()

            ->table("payment")
                ->increments("payment_id")
                ->smallInteger("customer_id")
                ->smallInteger("rental_id")
                ->decimal("amount", 4, 4)
                    ->inList()
                    ->mandatory()
                    ->unit("$")
                ->date("payment_date", true, true)
                ->belongsTo("rental")
                ->belongsTo("customer")
                ->belongsTo("staff")
                ->end()

            ->table("address")
                ->increments("address_id")
                ->string("address", 50)
                    ->mandatory()
                ->string("address2", 50)
                ->string("district", 20)
                    ->mandatory()
                ->smallInteger("city_id")
                ->string("postal_code", 10)
                    ->mandatory()
                ->string("phone", 20)
                    ->mandatory()
                ->timeStamp("last_update")
                ->hasMany("customer")
                    ->doc("Customers at the Address")
                ->hasMany("staff")
                    ->doc("Staffs at the Address")
                ->hasMany("store")
                    ->doc("Stores at the Address")
                ->belongsTo("city")
                ->end()

            ->table("city")
                ->increments("city_id")
                ->string("city", 50)
                    ->mandatory()
                ->smallInteger("country_id")
                ->timeStamp("last_update")
                ->hasMany("address")
                    ->doc("Addresses in the city")
                ->belongsTo("country")
                ->end()

            ->table("country")
                ->increments("country_id")
                ->string("country", 50)
                    ->mandatory()
                ->timeStamp("last_update")
                ->hasMany("city")
                    ->doc("Cities in the Country")
                ->hasManyThrough("address", "city")
                    ->doc("Country's Address")
                ->end()

            ->table("store")
                ->increments("store_id")
                ->smallInteger("manager_staff_id")
                ->smallInteger("address_id")
                ->belongsTo("address")
                ->hasMany("staff")
                    ->doc("Staffs in the Store")
                ->belongsToMany("film")
                    ->doc("Films in the Store")
                ->hasMany("customer")
                ->end()

            ->table("staff")
                ->increments("staff_id")
                ->string("first_name", 45)
                    ->mandatory()
                ->string("last_name", 15)
                    ->mandatory()
                ->smallInteger("address_id")
                //->blob("picture")
                ->string("email", 50)
                    ->mandatory()
                ->smallInteger("store_id")
                ->tinyInteger("active")
                    ->mandatory(true)
                    ->inList(false)
                ->string("username", 16)
                    ->mandatory()
                ->string("password", 40)
                    ->mandatory(true)
                    ->inList(false)
                ->timeStamp("last_update")
                ->hasMany("rental")
                    ->doc("Rentals make by the Staff")
                ->hasMany("payment")
                    ->doc("Payments received by the Staff")
                ->belongsTo("address")
                ->belongsTo("store")
                ->end()

            ->table("delivery")
                ->increments("id")
                ->string("identifiant", 25)
                    ->mandatory()
                ->date("date", true)
                ->longText("articles", false)
                ->end();

        //=========================== Define - ACL ==========================//
        $acl = new ACL();
        $acl->role("staff")
                ->domain("D1")
                    ->droit("CRUD")
                ->domain("D2")
                    ->droit("CR")
                ->end()

            ->role("user")
                ->domain("D1")
                    ->droit("CR")
                ->domain("D2")
                    ->droit("CRUD")
                ->end();
        //dd($acl);

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
