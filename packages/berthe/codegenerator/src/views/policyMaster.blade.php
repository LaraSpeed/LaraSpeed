

namespace App\Policies;


use App\User;
use App\@yield("namespace");
use Illuminate\Auth\Access\HandlesAuthorization;
use Berthe\Codegenerator\Core\ACLBO;
use App\ACLFactory;
use Berthe\Codegenerator\Core\ACLSpecificOperation;


class @yield("model")Policy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
    * Check Super Admin (This method is the first to be executed)
    *
    * @return bool
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
    * @return bool
    */
    public function view(User $user/*, @yield("viewModelParam") */){

        @yield("viewContent")
    }


    /**
    * Create Resource Policy.
    *
    * @return bool
    */
    public function create(User $user/*, @yield("createModelParam")*/){

        @yield("createContent")
    }

    /**
    * update Resource Policy.
    *
    * @return bool
    */
    public function update(User $user/*, @yield("updateModelParam")*/){

        @yield("updateContent")
    }

    /**
    * Delete Resource Policy.
    *
    * @return bool
    */
    public function delete(User $user/*, @yield("deleteModelParam")*/){

        @yield("deleteContent")
    }

}
