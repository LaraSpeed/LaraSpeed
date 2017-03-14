<?php 
namespace App\Policies;


use App\User;
use App\Category;
use Illuminate\Auth\Access\HandlesAuthorization;
use Berthe\Codegenerator\Core\ACLBO;
use App\ACLFactory;
use Berthe\Codegenerator\Core\ACLSpecificOperation;


class CategoryPolicy
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
    * View Resource Policy.
    *
    * @return  bool
    */
    public function view(User $user/*, Category $model */){

        $lvRole = $user->role;
        $lvAccessibleTables = (new ACLBO(ACLFactory::getACL()))->getAccessibleTables($lvRole);

        if(ACLSpecificOperation::canAccessTable(ACLFactory::getACL(), $lvRole, "category")){

            if(str_contains(ACLSpecificOperation::getDroit(ACLFactory::getACL(), $lvRole, "category")->getDroit(), "R")){
                return true;
            }
        }

        return false;    }


    /**
    * Create Resource Policy.
    *
    * @return  bool
    */
    public function create(User $user/*, Category $model*/){

        $lvRole = $user->role;
        $lvAccessibleTables = (new ACLBO(ACLFactory::getACL()))->getAccessibleTables($lvRole);

        if(ACLSpecificOperation::canAccessTable(ACLFactory::getACL(), $lvRole, "category")){

            if(str_contains(ACLSpecificOperation::getDroit(ACLFactory::getACL(), $lvRole, "category")->getDroit(), "C")){
                return true;
            }
        }

        return false;    }

    /**
    * update Resource Policy.
    *
    * @return  bool
    */
    public function update(User $user/*, Category $model*/){

        $lvRole = $user->role;
        $lvAccessibleTables = (new ACLBO(ACLFactory::getACL()))->getAccessibleTables($lvRole);

        if(ACLSpecificOperation::canAccessTable(ACLFactory::getACL(), $lvRole, "category")){

            if(str_contains(ACLSpecificOperation::getDroit(ACLFactory::getACL(), $lvRole, "category")->getDroit(), "U")){
                return true;
            }
        }

        return false;    }

    /**
    * Delete Resource Policy.
    *
    * @return  bool
    */
    public function delete(User $user/*, Category $model*/){

        $lvRole = $user->role;
        $lvAccessibleTables = (new ACLBO(ACLFactory::getACL()))->getAccessibleTables($lvRole);

        if(ACLSpecificOperation::canAccessTable(ACLFactory::getACL(), $lvRole, "category")){

            if(str_contains(ACLSpecificOperation::getDroit(ACLFactory::getACL(), $lvRole, "category")->getDroit(), "D")){
                return true;
            }
        }

        return false;    }

}
