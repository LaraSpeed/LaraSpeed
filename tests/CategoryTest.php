<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoryTest extends TestCase
{

    public $table = "Category";
    public $myURI = "/category";
    public $faker ;


    /**
     * Category List test.
     *
     * @return void
     */
    public function testList()
    {
        $this->faker = Faker\Factory::create();

        echo "\n1- Going to $this->table List Page.\n";
        $page = $this->visit($this->myURI);
        $page->assertResponseOk();

        echo "2- Check $this->table List Sommaire.\n";
        $categories = \App\Category::all();
        $i = 0;
        while($i < 10){
            echo "----- $this->table Named : ".$categories->get($i)->name." (OK)\n";
            $page->see($categories->get($i)->name);
            $i++;
        }

        echo "3- Visualize $this->table \n";
        $page->press("View")
             ->see($categories->get(0)->name);

        echo "4- Back To List of $this->table\n";
        $page->visit($this->myURI);

        $name = $this->faker->text(10);
        $newName = $this->faker->text(10);

        echo "5- Edit a Single $this->table\n";
        $page->press("Edit")
            ->type($newName, "name")
            ->press("Update");

        echo "5-1 Return to $this->table list \n";
        $page->visit($this->myURI);

        echo "5-2 Check Edit Commit \n";
        $page->press("View")
            ->see($newName)
            ->dontSee($name);

        echo "6- Edit last modified $this->table\n";
        $page->visit($this->myURI)
            ->press("Edit")
            ->type($name, "name")
            ->press("Update");

        echo "6-1 Return To $this->table List\n";
        $page->visit($this->myURI);

        echo "6-2 Check Edit Commit\n";
        $page->press("View")
            ->see($name)
            ->dontSee($newName);

        echo "7- Add new $this->table\n";
        $newN = "aaa".$this->faker->text(7);
        $page->visit($this->myURI)
            ->press("Add new Category")
            ->type($newN, "name")
            ->press("Create and return to list");

        echo "7-1 Return To $this->table List\n";
        $page->visit($this->myURI);

        echo "7-2 Check If New $this->table has Been Added\n";
        $page->type($newN, "keyword")
            ->press("Search")
            ->press("View")
            ->see($newN);

        echo "8- Delete Last Added Category\n";

        $id = \App\Category::where("name", "=", $newN)->get()->get(0)->category_id;

        $page->call("DELETE", "$this->myURI/$id");

        //$page->assertResponseOk();

        echo "8-1 Check if last $this->table was Deleted.\n";

        $page->visit($this->myURI)
            ->type($newN, "keyword")
            ->press("Search")
            ->see("No category matching keyword $newN.");

    }
}
