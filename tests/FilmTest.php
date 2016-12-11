<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Film;


class FilmTest extends TestCase
{

    public $table = "Film";

    /**
     * List Films Test
     *
     * @return void
     */
    public function testList()
    {
        echo "\n1- Going to $this->table List Page.\n";
        $page = $this->visit("/film");
        $page->assertResponseOk();

        echo "2- Check $this->table List Sommaire.\n";
        $films = Film::all();
        $i = 0;
        while($i < 10){
            echo "----- $this->table Titled : ".$films->get($i)->title." (OK)\n";
            $page->see($films->get($i)->title);
            $i++;
        }

        echo "3- Visualize $this->table \n";
        $page->press("View")
             ->see($films->get(0)->title);

        echo "4- Back To List of $this->table\n";
        $page->visit("/film");

        $title = "FilmRealTitle";
        $newTitle = "FilmTestTitle";

        echo "5- Edit a Single $this->table\n";
        $page->press("Edit")
             ->type($newTitle, "title")
             ->press("Update");

        echo "5-1 Return to $this->table list \n";
        $page->visit("/film");

        echo "5-2 Check Edit Commit \n";
        $page->press("View")
             ->see($newTitle)
             ->dontSee($title);

        echo "6- Edit last modified $this->table\n";
        $page->visit("/film")
             ->press("Edit")
             ->type($title, "title")
             ->press("Update");

        echo "6-1 Return To $this->table List\n";
        $page->visit("/film");

        echo "6-2 Check Edit Commit\n";
        $page->press("View")
             ->see($title)
             ->dontSee($newTitle);

        echo "7- Add new $this->table\n";
        $faker = Faker\Factory::create();
        $newT = "aaa".$faker->text;
        $page->visit("/film")
            ->press("Add new Film")
            ->type($newT, "title")
            ->type($faker->text, "description")
            ->type($faker->year."", "release_year")
            ->type($faker->numberBetween(1, 10)."", "rental_duration")
            ->type($faker->numberBetween(1, 10)."", "rental_rate")
            ->type($faker->numberBetween(100, 120)."", "length")
            ->type($faker->numberBetween(20, 100)."", "replacement_cost")
            ->select($faker->numberBetween(1, 5)."", "language")
            //->select($faker->numberBetween(1, 5)."", "category")
            ->press("Create and return to list");

        echo "7-1 Return To $this->table List\n";
        $page->visit("/film");

        echo "7-2 Check If New Film has Been Added\n";
        $page->type($newT, "keyword")
             ->press("Search")
             ->press("View")
             ->see("$newT");

        echo "8- Delete Last Added Film\n";
        $page->visit("/film")
            ->type($newT, "keyword")
            ->press("Search")
            ->see("$newT")
            //->press("Delete")
            /*->press("YES")
            ->dontSee("$newT")*/;

    }
}
