<?php 
namespace App\Http\Controllers;

use App\Acteur;

class ActeurController extends Controller {

    /**
    * Display a listing of the resource.
    *
    * @return  Response
    */
    public function index()
    {
        return view('acteur_show', ['acteurs' => Acteur::all()]);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return  Response
    */
    public function create()
    {
        return view('acteur');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return  Response
    */
    public function store()
    {
        $acteur = request()->all();
        //To Do Validate data

        //Store it
        Acteur::create($acteur);

        return back();
    }

    /**
    * Display the specified resource.
    *
    * @param    int  $id
    * @return  Response
    */
    public function show($id)
    {
        return view('acteur_display', ['acteur' => Acteur::find($id)]);
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param    int  $id
    * @return  Response
    */
    public function edit($id)
    {

    }

    /**
    * Update the specified resource in storage.
    *
    * @param    int  $id
    * @return  Response
    */
    public function update($id)
    {

    }

    /**
    * Remove the specified resource from storage.
    *
    * @param    int  $id
    * @return  Response
    */
    public function destroy($id)
    {
        Acteur::delete($id);
        return back();
    }

}

