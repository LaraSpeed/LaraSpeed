<?php 
namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var  array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
         'App\Actor' => 'App\Policies\ActorPolicy',
 'App\Film' => 'App\Policies\FilmPolicy',
 'App\Language' => 'App\Policies\LanguagePolicy',
 'App\Category' => 'App\Policies\CategoryPolicy',
 'App\Customer' => 'App\Policies\CustomerPolicy',
 'App\Rental' => 'App\Policies\RentalPolicy',
 'App\Payment' => 'App\Policies\PaymentPolicy',
 'App\Address' => 'App\Policies\AddressPolicy',
 'App\City' => 'App\Policies\CityPolicy',
 'App\Country' => 'App\Policies\CountryPolicy',
 'App\Store' => 'App\Policies\StorePolicy',
 'App\Staff' => 'App\Policies\StaffPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return  void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
