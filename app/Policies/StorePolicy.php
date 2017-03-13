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
    * @return  void
    */
    public function view(User $user, Store $model){

        $lvRole = $user->role;
$lvAccessibleTables = (new ACLBO(ACLFactory::getACL()))->getAccessibleTables($lvRole);

if(ACLSpecificOperation::canAccessTable(ACLFactory::getACL(), $lvRole, "store")){

if(str_contains(ACLSpecificOperation::getDroit(ACLFactory::getACL(), $lvRole, "store"), "R")){
return true;
}
}

return false;    }


    /**
    * Create Resource Policy.
    *
    * @return  void
    */
    public function create(User $user, Store $model){

        $lvRole = $user->role;
$lvAccessibleTables = (new ACLBO(ACLFactory::getACL()))->getAccessibleTables($lvRole);

if(ACLSpecificOperation::canAccessTable(ACLFactory::getACL(), $lvRole, "store")){

if(str_contains(ACLSpecificOperation::getDroit(ACLFactory::getACL(), $lvRole, "store"), "C")){
return true;
}
}

return false;    }

    /**
    * update Resource Policy.
    *
    * @return  void
    */
    public function update(User $user, Store $model){

        $lvRole = $user->role;
$lvAccessibleTables = (new ACLBO(ACLFactory::getACL()))->getAccessibleTables($lvRole);

if(ACLSpecificOperation::canAccessTable(ACLFactory::getACL(), $lvRole, "store")){

if(str_contains(ACLSpecificOperation::getDroit(ACLFactory::getACL(), $lvRole, "store"), "U")){
return true;
}
}

return false;    }

    /**
    * Delete Resource Policy.
    *
    * @return  void
    */
    public function delete(User $user, Store $model){

        $lvRole = $user->role;
$lvAccessibleTables = (new ACLBO(ACLFactory::getACL()))->getAccessibleTables($lvRole);

if(ACLSpecificOperation::canAccessTable(ACLFactory::getACL(), $lvRole, "store")){

if(str_contains(ACLSpecificOperation::getDroit(ACLFactory::getACL(), $lvRole, "store"), "D")){
return true;
}
}

return false;    }

}
