
namespace App\Http\Controllers;

use App\<?php echo $__env->yieldContent('modelNamespace'); ?>;

class <?php echo $__env->yieldContent('controllerName'); ?> extends Controller {

    /**
    * Display a listing of the resource.
    *
    * @return  Response
    */
    public function index()
    {
        return view('<?php echo $__env->yieldContent('viewName'); ?>_show', ['<?php echo $__env->yieldContent('varID'); ?>' => <?php echo $__env->yieldContent('modelCall'); ?>]);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return  Response
    */
    public function create()
    {
        return view('<?php echo $__env->yieldContent('createView'); ?>');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return  Response
    */
    public function store()
    {
        $<?php echo $__env->yieldContent('storeVar'); ?> = request()->all();
        //To Do Validate data

        //Store it
        <?php echo $__env->yieldContent('ModelName1'); ?>::create($<?php echo $__env->yieldContent('storeVar1'); ?>);

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
        return view('<?php echo $__env->yieldContent('singleView'); ?>_display', ['<?php echo $__env->yieldContent('varID1'); ?>' => <?php echo $__env->yieldContent('modelCall1'); ?>]);
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
        <?php echo $__env->yieldContent('deleteCall'); ?>;
        return back();
    }

}

