
namespace App\Http\Controllers;

use App\<?php echo $__env->yieldContent('modelNamespace'); ?>;
<?php echo $__env->yieldContent('namespaces'); ?>

class <?php echo $__env->yieldContent('controllerName'); ?> extends Controller {

    /**
    * Display a listing of the resource.
    *
    * @return  Response
    */
    public function index()
    {
        request()->session()->forget("keyword");
        request()->session()->forget("clear");
        request()->session()->forget("defaultSelect");
        session(["mutate" => '1']);
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
        <?php echo $__env->yieldContent('storeContent'); ?>

        return <?php echo $__env->yieldContent('store'); ?>
    }

    /**
    * Display the specified resource.
    *
    * @param    Mixed
    * @return  Response
    */
    public function show(<?php echo $__env->yieldContent('object'); ?>)
    {
        request()->session()->forget("mutate");
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
        request()->session()->forget("mutate");
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
        <?php echo $__env->yieldContent('related'); ?>
    }

    /**
    * Search Table element By keyword
    * @return  Response
    */
    public function search(){
        $keyword = request()->get('keyword');

        if(request()->exists('tab')){
            session(['keyword' => $keyword]);
            return back();
        }

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

    /**
    * Clear Search Pattern
    *
    */
    public function clearSearch(){
        request()->session()->forget("keyword");
        return back();
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

