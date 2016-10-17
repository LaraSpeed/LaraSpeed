<?php 
namespace App\Http\Controllers;

use App\Language;

class LanguageController extends Controller {

    /**
    * Display a listing of the resource.
    *
    * @return  Response
    */
    public function index()
    {
        return view('language_show', ['languages' => Language::paginate(20)]);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return  Response
    */
    public function create()
    {
        return view('language');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return  Response
    */
    public function store()
    {
        $language = request()->all();
        //To Do Validate data

        //Store it
        Language::create($language);

        return back();
    }

    /**
    * Display the specified resource.
    *
    * @param    Mixed
    * @return  Response
    */
    public function show(Language $language )
    {
        $language->load(array("film",));
        return view('language_display', compact('language'));        }

    /**
    * Show the form for editing the specified resource.
    *
    * @param    Mixed
    * @return  Response
    */
    public function edit(Language $language )
    {
        $language->load(array("film",));
        return view('language_edit', compact('language'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param    Mixed
    * @return  Response
    */
    public function update(Language $language )
    {
            $language->update(request()->all());

        return back();
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param    Mixed
    * @return  Response
    */
    public function destroy(Language $language )
    {
            $language->delete();
        return back();
    }

    /**
    * Load and display related tables.
    * @param    Mixed
    * @return  Response
    */
    public function related(Language $language ){
        $language->load(array("film",));
return view('language_related', compact('language'));    }

    /**
    * Search Table element By keyword
    * @return  Response
    */
    public function search(){
        $keyword = request()->get('keyword');
        $keyword = '%'.$keyword.'%';

        $languages = Language::where('language_id', 'like', $keyword)
         ->orWhere('language_id', 'like', $keyword)

         ->orWhere('name', 'like', $keyword)

         ->orWhere('last_update', 'like', $keyword)

        ->paginate(20);
    $languages->setPath("search?keyword=$keyword");
    return view('language_show', compact('languages'));
    }

}

