<?php 
namespace App\Policies;


use App\User;
use App\Rental;
use Illuminate\Auth\Access\HandlesAuthorization;
use Berthe\Codegenerator\Core\ACLBO;
use App\ACLFactory;
use Berthe\Codegenerator\Core\ACLSpecificOperation;


class RentalPolicy
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
    public function view(User $user, Rental $model){

        $lvRole = $user->role;
$lvAccessibleTables = (new ACLBO(ACLFactory::getACL()))->getAccessibleTables($lvRole);

if(ACLSpecificOperation::canAccessTable(ACLFactory::getACL(), $lvRole, "rental")){

if(str_contains(ACLSpecificOperation::getDroit(ACLFactory::getACL(), $lvRole, "rental"), "R")){
return true;
}
}

return false;    }


    /**
    * Create Resource Policy.
    *
    * @return  void
    */
    public function create(User $user, Rental $model){

        $lvRole = $user->role;
$lvAccessibleTables = (new ACLBO(ACLFactory::getACL()))->getAccessibleTables($lvRole);

if(ACLSpecificOperation::canAccessTable(ACLFactory::getACL(), $lvRole, "rental")){

if(str_contains(ACLSpecificOperation::getDroit(ACLFactory::getACL(), $lvRole, "rental"), "C")){
return true;
}
}

return false;    }

    /**
    * update Resource Policy.
    *
    * @return  void
    */
    public function update(User $user, Rental $model){

        $lvRole = $user->role;
$lvAccessibleTables = (new ACLBO(ACLFactory::getACL()))->getAccessibleTables($lvRole);

if(ACLSpecificOperation::canAccessTable(ACLFactory::getACL(), $lvRole, "rental")){

if(str_contains(ACLSpecificOperation::getDroit(ACLFactory::getACL(), $lvRole, "rental"), "U")){
return true;
}
}

return false;    }

    /**
    * Delete Resource Policy.
    *
    * @return  void
    */
    public function delete(User $user, Rental $model){

        $lvRole = $user->role;
$lvAccessibleTables = (new ACLBO(ACLFactory::getACL()))->getAccessibleTables($lvRole);

if(ACLSpecificOperation::canAccessTable(ACLFactory::getACL(), $lvRole, "rental")){

if(str_contains(ACLSpecificOperation::getDroit(ACLFactory::getACL(), $lvRole, "rental"), "D")){
return true;
}
}

return false;    }

}
