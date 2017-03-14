<?php 
namespace App\Policies;


use App\User;
use App\Film;
use Illuminate\Auth\Access\HandlesAuthorization;
use Berthe\Codegenerator\Core\ACLBO;
use App\ACLFactory;
use Berthe\Codegenerator\Core\ACLSpecificOperation;


class FilmPolicy
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
    public function view(User $user/*, Film $model */){

        $lvRole = $user->role;
        $lvAccessibleTables = (new ACLBO(ACLFactory::getACL()))->getAccessibleTables($lvRole);

        if(ACLSpecificOperation::canAccessTable(ACLFactory::getACL(), $lvRole, "film")){

            if(str_contains(ACLSpecificOperation::getDroit(ACLFactory::getACL(), $lvRole, "film")->getDroit(), "R")){
                return true;
            }
        }

        return false;    }


    /**
    * Create Resource Policy.
    *
    * @return  bool
    */
    public function create(User $user/*, Film $model*/){

        $lvRole = $user->role;
        $lvAccessibleTables = (new ACLBO(ACLFactory::getACL()))->getAccessibleTables($lvRole);

        if(ACLSpecificOperation::canAccessTable(ACLFactory::getACL(), $lvRole, "film")){

            if(str_contains(ACLSpecificOperation::getDroit(ACLFactory::getACL(), $lvRole, "film")->getDroit(), "C")){
                return true;
            }
        }

        return false;    }

    /**
    * update Resource Policy.
    *
    * @return  bool
    */
    public function update(User $user/*, Film $model*/){

        $lvRole = $user->role;
        $lvAccessibleTables = (new ACLBO(ACLFactory::getACL()))->getAccessibleTables($lvRole);

        if(ACLSpecificOperation::canAccessTable(ACLFactory::getACL(), $lvRole, "film")){

            if(str_contains(ACLSpecificOperation::getDroit(ACLFactory::getACL(), $lvRole, "film")->getDroit(), "U")){
                return true;
            }
        }

        return false;    }

    /**
    * Delete Resource Policy.
    *
    * @return  bool
    */
    public function delete(User $user/*, Film $model*/){

        $lvRole = $user->role;
        $lvAccessibleTables = (new ACLBO(ACLFactory::getACL()))->getAccessibleTables($lvRole);

        if(ACLSpecificOperation::canAccessTable(ACLFactory::getACL(), $lvRole, "film")){

            if(str_contains(ACLSpecificOperation::getDroit(ACLFactory::getACL(), $lvRole, "film")->getDroit(), "D")){
                return true;
            }
        }

        return false;    }

}
