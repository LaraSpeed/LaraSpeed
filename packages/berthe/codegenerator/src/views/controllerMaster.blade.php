
namespace App\Http\Controllers;

use App\@yield('modelNamespace');

class @yield('controllerName') extends Controller {

    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        return view('@yield('viewName')_show', ['@yield('varID')' => @yield('modelCall')]);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create()
    {
        return view('@yield('createView')');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
    public function store()
    {
        $@yield('storeVar') = request()->all();
        //To Do Validate data

        //Store it
        @yield('ModelName1')::create($@yield('storeVar1'));

        return back();
    }

    /**
    * Display the specified resource.
    *
    * @param  Mixed
    * @return Response
    */
    public function show(@yield('object'))
    {
        @yield('show')
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  Mixed
    * @return Response
    */
    public function edit(@yield('editParam'))
    {
        @yield('edit')

    }

    /**
    * Update the specified resource in storage.
    *
    * @param  Mixed
    * @return Response
    */
    public function update(@yield('updateParam'))
    {
        @yield('update')

        return back();
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  Mixed
    * @return Response
    */
    public function destroy(@yield('deleteParam'))
    {
        @yield('delete')
        return back();
    }

    /**
    * Load and display related tables.
    * @param  Mixed
    * @return Response
    */
    public function related(@yield('relatedParam')){
        @yield('related')
    }

    /**
    * Search Table element By keyword
    * @return Response
    */
    public function search(){
        $keyword = request()->get('keyword');
        $keyword = '%'.$keyword.'%';

        @yield('search')
    }

    /**
    * Sort Table element
    * @return Response
    */
    public function sort(){
        $path = "";

        @yield('sort')
    }

    @yield('relations')

    private function getOrder($param){
        if(session($param, "-1") != "-1"){
            session([$param => session($param) == 'asc' ? 'desc':'asc']);
        }else{
            session([$param => 'asc']);
        }
        return session($param);
    }



}

