<?php 
namespace App\Policies;


use App\User;
use App\Actor;
use Illuminate\Auth\Access\HandlesAuthorization;
use Berthe\Codegenerator\Core\ACLBO;
use App\ACLFactory;
use Berthe\Codegenerator\Core\ACLSpecificOperation;


class ActorPolicy
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
    public function view(User $user/*, Actor $model */){

        $lvRole = $user->role;
        $lvAccessibleTables = (new ACLBO(ACLFactory::getACL()))->getAccessibleTables($lvRole);

        if(ACLSpecificOperation::canAccessTable(ACLFactory::getACL(), $lvRole, "actor")){

            if(str_contains(ACLSpecificOperation::getDroit(ACLFactory::getACL(), $lvRole, "actor")->getDroit(), "R")){
                return true;
            }
        }

        return false;    }


    /**
    * Create Resource Policy.
    *
    * @return  bool
    */
    public function create(User $user/*, Actor $model*/){

        $lvRole = $user->role;
        $lvAccessibleTables = (new ACLBO(ACLFactory::getACL()))->getAccessibleTables($lvRole);

        if(ACLSpecificOperation::canAccessTable(ACLFactory::getACL(), $lvRole, "actor")){

            if(str_contains(ACLSpecificOperation::getDroit(ACLFactory::getACL(), $lvRole, "actor")->getDroit(), "C")){
                return true;
            }
        }

        return false;    }

    /**
    * update Resource Policy.
    *
    * @return  bool
    */
    public function update(User $user/*, Actor $model*/){

        $lvRole = $user->role;
        $lvAccessibleTables = (new ACLBO(ACLFactory::getACL()))->getAccessibleTables($lvRole);

        if(ACLSpecificOperation::canAccessTable(ACLFactory::getACL(), $lvRole, "actor")){

            if(str_contains(ACLSpecificOperation::getDroit(ACLFactory::getACL(), $lvRole, "actor")->getDroit(), "U")){
                return true;
            }
        }

        return false;    }

    /**
    * Delete Resource Policy.
    *
    * @return  bool
    */
    public function delete(User $user/*, Actor $model*/){

        $lvRole = $user->role;
        $lvAccessibleTables = (new ACLBO(ACLFactory::getACL()))->getAccessibleTables($lvRole);

        if(ACLSpecificOperation::canAccessTable(ACLFactory::getACL(), $lvRole, "actor")){

            if(str_contains(ACLSpecificOperation::getDroit(ACLFactory::getACL(), $lvRole, "actor")->getDroit(), "D")){
                return true;
            }
        }

        return false;    }

}
