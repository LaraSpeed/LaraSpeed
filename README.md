# LaraSpeed

<b>LaraSpeed</b> is Laravel Code generator package based on application Conceptual Data Model.

Indeed, <b>LaraSpeed</b> package generate your Laravel 5.3 application Models, Controllers, Views, Migrations after having specified the Conceptuel Data Model. As an example is always welcome, let's start by an example.

Let's consider the following Conceptual Data Model  :

    Film (film_id, language_id, title, description, release_year, last_update)
    Language (language_id, name, last_update)
    Category (category_id, name, last_update)
    
With relations such as :

    Film belongs to many Category.
    Category belongs to many Film.
    Language has many Film.

So to specifiy such Data Model using the <b>LaraSpeed</b> and let it generate the corresponding code, we proceed like that :
        
        $mcd = new MCD();
        $mcd->table("film")                         //Table film
                ->increments("film_id")           
                ->smallInteger("language_id")
                ->string("title", 255)            
                ->text("description")             
                ->char("release_year", 4)         
                ->timeStamp("last_update")
                ->belongsTo("language")         //Relation Film => Language.
                ->belongsToMany("category")     //Relation Film => Category.
                ->end()

            ->table("language")                 //Table language
                ->increments("language_id")
                ->char("name", 20)
                ->timeStamp("last_update")
                ->hasMany("film")               //Relation Language => Film
                ->end()

            ->table("category")                 //Table category
                ->tinyInteger("category_id")
                ->string("name", 25)
                ->timeStamp("last_update")
                ->belongsToMany("film")         //Relation Category => Film
                ->end();
  
As you can see, the Data Model is specified using Laravel Schema specification Model.

This will generate :
  Models :
  (Film.php, Category.php and Language.php) in app directory.
  
  Controller :
  (FilmController.php, CategoryController.php and LanguageController.php) in app/Http/Controller directory with      necessary code to handle Rest Controller Requests.
 
 Migration :
 (date_create_film_table.php, date_create_category_table.php, date_create_language_table.php and date_create_foreign_keys.php) in database/migrations directory.
  
  Views :
    [film, language, category].blade.php : Contains form to insert new [film, language, category] element.
    [film, language, category]_show.blade.php : Contains necessary code to display different table data.
    [film, language, category]_display.blade.php : Will display single [film, language category] with it relationnal table data.
      For example film_display.blade.php will display single Film with Language and Category related to the displaying film.
  
  Those views can be accessed each from others depending on the relation type.
  For example from film_show.blade.php (Display list of film) it's possible to show a single film (film_display.blade.php).
  
  <h3>How to use the <u><b>LaraSpeed</b></u> ?</h3>
  
 <ul>
 <li>Download the project above (LaraSpeed).</li>
 <li>In project file <b>app\in\GeneratorCode.php</b> define your Conceptual Data Model as above in getSite() method.</li>
 <li>Finally run command : php artisan code:generate and get your application up and running.</li>
 </ul>
  
<h3><u><b>LaraSpeed</b></u> supported type in Conceptual Data Model</h3>
  <b>LaraSpeed</b> support all mysql data Type.

<h3><u><b>LaraSpeed</b></u> supported Relation in Conceptual Data Model</h3>
  <b>For the moment LaraSpeed support 3 relations type (1:1, 1:n and n:n).</b>
  
<h3><u><b>LaraSpeed</b></u> limits</h3>
   <ul>
   <li>You have to specify first of all the primary key field for every table when deifining Conceptual Data Model.</li>
   <li> For n:n (ManyToMany) relation, you have to create the intermediate table between the concerned table and specify        the intermediate table name as second argument in concerned tables Model belongsToMany(...) methods.   
   </li>
   </ul>
 
