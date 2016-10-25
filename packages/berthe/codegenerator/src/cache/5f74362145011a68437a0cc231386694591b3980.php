
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
        request()->session()->forget("keyword");

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
    * @param    Mixed
    * @return  Response
    */
    public function show(<?php echo $__env->yieldContent('object'); ?>)
    {
        <?php echo $__env->yieldContent('show'); ?>
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param    Mixed
    * @return  Response
    */
    public function edit(<?php echo $__env->yieldContent('editParam'); ?>)
    {
        <?php echo $__env->yieldContent('edit'); ?>

    }

    /**
    * Update the specified resource in storage.
    *
    * @param    Mixed
    * @return  Response
    */
    public function update(<?php echo $__env->yieldContent('updateParam'); ?>)
    {
        <?php echo $__env->yieldContent('update'); ?>

        return back();
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param    Mixed
    * @return  Response
    */
    public function destroy(<?php echo $__env->yieldContent('deleteParam'); ?>)
    {
        <?php echo $__env->yieldContent('delete'); ?>
        return back();
    }

    /**
    * Load and display related tables.
    * @param    Mixed
    * @return  Response
    */
    public function related(<?php echo $__env->yieldContent('relatedParam'); ?>){
        <?php echo $__env->yieldContent('related'); ?>
    }

    /**
    * Search Table element By keyword
    * @return  Response
    */
    public function search(){
        $keyword = request()->get('keyword');

        session(["keyword" => $keyword]);

        $keyword = '%'.$keyword.'%';

        <?php echo $__env->yieldContent('search'); ?>
    }

    /**
    * Sort Table element
    * @return  Response
    */
    public function sort(){
        $path = "";

        <?php echo $__env->yieldContent('sort'); ?>
    }

    <?php echo $__env->yieldContent('relations'); ?>

    private function getOrder($param){
        if(session($param, "none") != "none"){
            session([$param => session($param, 'asc') == 'asc' ? 'desc':'asc']);
        }else{
            session([$param => 'asc']);
        }
        return session($param);
    }



}

