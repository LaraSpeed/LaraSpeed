<?php 
namespace App\Policies;


use App\User;
use App\Address;
use Illuminate\Auth\Access\HandlesAuthorization;
use Berthe\Codegenerator\Core\ACLBO;
use App\ACLFactory;
use Berthe\Codegenerator\Core\ACLSpecificOperation;


class AddressPolicy
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
    public function view(User $user, Address $model){

        $lvRole = $user->role;
$lvAccessibleTables = (new ACLBO(ACLFactory::getACL()))->getAccessibleTables($lvRole);

if(ACLSpecificOperation::canAccessTable(ACLFactory::getACL(), $lvRole, "address")){

if(str_contains(ACLSpecificOperation::getDroit(ACLFactory::getACL(), $lvRole, "address"), "R")){
return true;
}
}

return false;    }


    /**
    * Create Resource Policy.
    *
    * @return  void
    */
    public function create(User $user, Address $model){

        $lvRole = $user->role;
$lvAccessibleTables = (new ACLBO(ACLFactory::getACL()))->getAccessibleTables($lvRole);

if(ACLSpecificOperation::canAccessTable(ACLFactory::getACL(), $lvRole, "address")){

if(str_contains(ACLSpecificOperation::getDroit(ACLFactory::getACL(), $lvRole, "address"), "C")){
return true;
}
}

return false;    }

    /**
    * update Resource Policy.
    *
    * @return  void
    */
    public function update(User $user, Address $model){

        $lvRole = $user->role;
$lvAccessibleTables = (new ACLBO(ACLFactory::getACL()))->getAccessibleTables($lvRole);

if(ACLSpecificOperation::canAccessTable(ACLFactory::getACL(), $lvRole, "address")){

if(str_contains(ACLSpecificOperation::getDroit(ACLFactory::getACL(), $lvRole, "address"), "U")){
return true;
}
}

return false;    }

    /**
    * Delete Resource Policy.
    *
    * @return  void
    */
    public function delete(User $user, Address $model){

        $lvRole = $user->role;
$lvAccessibleTables = (new ACLBO(ACLFactory::getACL()))->getAccessibleTables($lvRole);

if(ACLSpecificOperation::canAccessTable(ACLFactory::getACL(), $lvRole, "address")){

if(str_contains(ACLSpecificOperation::getDroit(ACLFactory::getACL(), $lvRole, "address"), "D")){
return true;
}
}

return false;    }

}
