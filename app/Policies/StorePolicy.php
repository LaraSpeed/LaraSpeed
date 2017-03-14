<?php 
namespace App\Policies;


use App\User;
use App\Store;
use Illuminate\Auth\Access\HandlesAuthorization;
use Berthe\Codegenerator\Core\ACLBO;
use App\ACLFactory;
use Berthe\Codegenerator\Core\ACLSpecificOperation;


class StorePolicy
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
    public function view(User $user/*, Store $model */){

        $lvRole = $user->role;
        $lvAccessibleTables = (new ACLBO(ACLFactory::getACL()))->getAccessibleTables($lvRole);

        if(ACLSpecificOperation::canAccessTable(ACLFactory::getACL(), $lvRole, "store")){

            if(str_contains(ACLSpecificOperation::getDroit(ACLFactory::getACL(), $lvRole, "store")->getDroit(), "R")){
                return true;
            }
        }

        return false;    }


    /**
    * Create Resource Policy.
    *
    * @return  bool
    */
    public function create(User $user/*, Store $model*/){

        $lvRole = $user->role;
        $lvAccessibleTables = (new ACLBO(ACLFactory::getACL()))->getAccessibleTables($lvRole);

        if(ACLSpecificOperation::canAccessTable(ACLFactory::getACL(), $lvRole, "store")){

            if(str_contains(ACLSpecificOperation::getDroit(ACLFactory::getACL(), $lvRole, "store")->getDroit(), "C")){
                return true;
            }
        }

        return false;    }

    /**
    * update Resource Policy.
    *
    * @return  bool
    */
    public function update(User $user/*, Store $model*/){

        $lvRole = $user->role;
        $lvAccessibleTables = (new ACLBO(ACLFactory::getACL()))->getAccessibleTables($lvRole);

        if(ACLSpecificOperation::canAccessTable(ACLFactory::getACL(), $lvRole, "store")){

            if(str_contains(ACLSpecificOperation::getDroit(ACLFactory::getACL(), $lvRole, "store")->getDroit(), "U")){
                return true;
            }
        }

        return false;    }

    /**
    * Delete Resource Policy.
    *
    * @return  bool
    */
    public function delete(User $user/*, Store $model*/){

        $lvRole = $user->role;
        $lvAccessibleTables = (new ACLBO(ACLFactory::getACL()))->getAccessibleTables($lvRole);

        if(ACLSpecificOperation::canAccessTable(ACLFactory::getACL(), $lvRole, "store")){

            if(str_contains(ACLSpecificOperation::getDroit(ACLFactory::getACL(), $lvRole, "store")->getDroit(), "D")){
                return true;
            }
        }

        return false;    }

}
