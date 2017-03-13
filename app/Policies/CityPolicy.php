<?php 
namespace App\Policies;


use App\User;
use App\City;
use Illuminate\Auth\Access\HandlesAuthorization;
use Berthe\Codegenerator\Core\ACLBO;
use App\ACLFactory;
use Berthe\Codegenerator\Core\ACLSpecificOperation;


class CityPolicy
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
    public function view(User $user, City $model){

        $lvRole = $user->role;
$lvAccessibleTables = (new ACLBO(ACLFactory::getACL()))->getAccessibleTables($lvRole);

if(ACLSpecificOperation::canAccessTable(ACLFactory::getACL(), $lvRole, "city")){

if(str_contains(ACLSpecificOperation::getDroit(ACLFactory::getACL(), $lvRole, "city"), "R")){
return true;
}
}

return false;    }


    /**
    * Create Resource Policy.
    *
    * @return  void
    */
    public function create(User $user, City $model){

        $lvRole = $user->role;
$lvAccessibleTables = (new ACLBO(ACLFactory::getACL()))->getAccessibleTables($lvRole);

if(ACLSpecificOperation::canAccessTable(ACLFactory::getACL(), $lvRole, "city")){

if(str_contains(ACLSpecificOperation::getDroit(ACLFactory::getACL(), $lvRole, "city"), "C")){
return true;
}
}

return false;    }

    /**
    * update Resource Policy.
    *
    * @return  void
    */
    public function update(User $user, City $model){

        $lvRole = $user->role;
$lvAccessibleTables = (new ACLBO(ACLFactory::getACL()))->getAccessibleTables($lvRole);

if(ACLSpecificOperation::canAccessTable(ACLFactory::getACL(), $lvRole, "city")){

if(str_contains(ACLSpecificOperation::getDroit(ACLFactory::getACL(), $lvRole, "city"), "U")){
return true;
}
}

return false;    }

    /**
    * Delete Resource Policy.
    *
    * @return  void
    */
    public function delete(User $user, City $model){

        $lvRole = $user->role;
$lvAccessibleTables = (new ACLBO(ACLFactory::getACL()))->getAccessibleTables($lvRole);

if(ACLSpecificOperation::canAccessTable(ACLFactory::getACL(), $lvRole, "city")){

if(str_contains(ACLSpecificOperation::getDroit(ACLFactory::getACL(), $lvRole, "city"), "D")){
return true;
}
}

return false;    }

}
