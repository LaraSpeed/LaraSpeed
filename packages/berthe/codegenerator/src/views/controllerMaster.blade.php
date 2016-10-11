
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
    * @param  int  $id
    * @return Response
    */
    public function update($id)
    {

    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function destroy($id)
    {
        @yield('deleteCall');
        return back();
    }

}

