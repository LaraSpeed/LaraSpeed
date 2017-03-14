
namespace App\Http\Controllers;

use App\@yield('modelNamespace');
@yield('namespaces')

class @yield('controllerName') extends Controller {


    /**
    *   Create a new controller instance.
    *
    *   @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        $this->authorize("view", @yield("indexModel"));

        request()->session()->forget("keyword");
        request()->session()->forget("clear");
        request()->session()->forget("defaultSelect");
        session(["mutate" => '1']);
        return view('@yield('viewName')_show', ['@yield('varID')' => @yield('modelCall')]);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create()
    {
        $this->authorize("create", @yield("createModel"));

        return view('@yield('createView')');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
    public function store()
    {
        $this->authorize("create", @yield("storeModel"));

        @yield('storeContent')

        return @yield('store')
    }

    /**
    * Display the specified resource.
    *
    * @param  Mixed
    * @return Response
    */
    public function show(@yield('object'))
    {
        $this->authorize("view", @yield("showModel"));

        request()->session()->forget("mutate");
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
        $this->authorize("update", @yield("editModel"));

        request()->session()->forget("mutate");
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
        $this->authorize("update", @yield("updateModel"));

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
        $this->authorize("delete", @yield("destroyModel"));

        @yield('delete')
        return back();
    }

    /**
    * Load and display related tables.
    * @param  Mixed
    * @return Response
    */
    public function related(@yield('relatedParam')){

        session(["mutate" => '1']);
        if(request()->exists('cs')){
            request()->session()->forget("keyword");
            return back();
        }

        if(request()->exists('tab') && session("clear", "none") != request()->get('tab')){
            request()->session()->forget("keyword");
            session(["clear" => request()->get('tab')]);
        }

        $table = request()->get('tab');
        @yield('related')
    }

    /**
    * Search Table element By keyword
    * @return Response
    */
    public function search(){
        $keyword = request()->get('keyword');

        if(request()->exists('tab')){
            session(['keyword' => $keyword]);
            return back();
        }

        session(["keyword" => $keyword]);

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

    /**
    * Clear Search Pattern
    *
    */
    public function clearSearch(){
        request()->session()->forget("keyword");
        return back();
    }

    @yield('relations')

    private function getOrder($param){
        if(session($param, "none") != "none"){
            session([$param => session($param, 'asc') == 'asc' ? 'desc':'asc']);
        }else{
            session([$param => 'asc']);
        }
        return session($param);
    }



}

