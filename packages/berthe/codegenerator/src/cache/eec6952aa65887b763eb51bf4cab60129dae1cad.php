

namespace App\Policies;


use App\User;
use App\<?php echo $__env->yieldContent("namespace"); ?>;
use Illuminate\Auth\Access\HandlesAuthorization;
use Berthe\Codegenerator\Core\ACLBO;
use App\ACLFactory;
use Berthe\Codegenerator\Core\ACLSpecificOperation;


class <?php echo $__env->yieldContent("model"); ?>Policy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return  void
     */
    public function __construct()
    {
        //
    }

    /**
    * Check Super Admin (This method is the first to be executed)
    *
    * @return  bool
    */
    public function before($user, $ability)
    {
        if ($user->isSuperAdmin()) {
            return true;
        }
    }

    /**
    * View Resource Policy.
    *
    * @return  bool
    */
    public function view(User $user/*, <?php echo $__env->yieldContent("viewModelParam"); ?> */){

        <?php echo $__env->yieldContent("viewContent"); ?>
    }


    /**
    * Create Resource Policy.
    *
    * @return  bool
    */
    public function create(User $user/*, <?php echo $__env->yieldContent("createModelParam"); ?>*/){

        <?php echo $__env->yieldContent("createContent"); ?>
    }

    /**
    * update Resource Policy.
    *
    * @return  bool
    */
    public function update(User $user/*, <?php echo $__env->yieldContent("updateModelParam"); ?>*/){

        <?php echo $__env->yieldContent("updateContent"); ?>
    }

    /**
    * Delete Resource Policy.
    *
    * @return  bool
    */
    public function delete(User $user/*, <?php echo $__env->yieldContent("deleteModelParam"); ?>*/){

        <?php echo $__env->yieldContent("deleteContent"); ?>
    }

}
