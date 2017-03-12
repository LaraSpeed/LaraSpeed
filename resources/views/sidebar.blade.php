<ul class="nav nav-main">
    <li>
        <a href="{{url("/home")}}">
            <i class="fa fa-home" aria-hidden="true"></i>
            <span class="text-md">Dashboard</span>
        </a>
    </li>

            @if(\Berthe\Codegenerator\Core\ACLSpecificOperation::canAccessTable(\App\ACLFactory::getACL(), Auth::user()->role, "actor"))
        <li>
            <a href="{{url("/actor")}}">
                <i class="fa fa-play" aria-hidden="true"></i>
                <span class="text-md">Actors</span>
            </a>
        </li>
        @endif
             @if(\Berthe\Codegenerator\Core\ACLSpecificOperation::canAccessTable(\App\ACLFactory::getACL(), Auth::user()->role, "film"))
        <li>
            <a href="{{url("/film")}}">
                <i class="fa fa-film" aria-hidden="true"></i>
                <span class="text-md">Films</span>
            </a>
        </li>
        @endif
             @if(\Berthe\Codegenerator\Core\ACLSpecificOperation::canAccessTable(\App\ACLFactory::getACL(), Auth::user()->role, "language"))
        <li>
            <a href="{{url("/language")}}">
                <i class="fa fa-language" aria-hidden="true"></i>
                <span class="text-md">Languages</span>
            </a>
        </li>
        @endif
             @if(\Berthe\Codegenerator\Core\ACLSpecificOperation::canAccessTable(\App\ACLFactory::getACL(), Auth::user()->role, "category"))
        <li>
            <a href="{{url("/category")}}">
                <i class="fa fa-tags" aria-hidden="true"></i>
                <span class="text-md">Categories</span>
            </a>
        </li>
        @endif
             @if(\Berthe\Codegenerator\Core\ACLSpecificOperation::canAccessTable(\App\ACLFactory::getACL(), Auth::user()->role, "customer"))
        <li>
            <a href="{{url("/customer")}}">
                <i class="fa fa-users" aria-hidden="true"></i>
                <span class="text-md">Customers</span>
            </a>
        </li>
        @endif
             @if(\Berthe\Codegenerator\Core\ACLSpecificOperation::canAccessTable(\App\ACLFactory::getACL(), Auth::user()->role, "rental"))
        <li>
            <a href="{{url("/rental")}}">
                <i class="fa fa-industry" aria-hidden="true"></i>
                <span class="text-md">Rentals</span>
            </a>
        </li>
        @endif
             @if(\Berthe\Codegenerator\Core\ACLSpecificOperation::canAccessTable(\App\ACLFactory::getACL(), Auth::user()->role, "payment"))
        <li>
            <a href="{{url("/payment")}}">
                <i class="fa fa-paypal" aria-hidden="true"></i>
                <span class="text-md">Payments</span>
            </a>
        </li>
        @endif
             @if(\Berthe\Codegenerator\Core\ACLSpecificOperation::canAccessTable(\App\ACLFactory::getACL(), Auth::user()->role, "address"))
        <li>
            <a href="{{url("/address")}}">
                <i class="fa fa-hotel" aria-hidden="true"></i>
                <span class="text-md">Addresses</span>
            </a>
        </li>
        @endif
             @if(\Berthe\Codegenerator\Core\ACLSpecificOperation::canAccessTable(\App\ACLFactory::getACL(), Auth::user()->role, "city"))
        <li>
            <a href="{{url("/city")}}">
                <i class="fa fa-home" aria-hidden="true"></i>
                <span class="text-md">Cities</span>
            </a>
        </li>
        @endif
             @if(\Berthe\Codegenerator\Core\ACLSpecificOperation::canAccessTable(\App\ACLFactory::getACL(), Auth::user()->role, "country"))
        <li>
            <a href="{{url("/country")}}">
                <i class="fa fa-home" aria-hidden="true"></i>
                <span class="text-md">Countries</span>
            </a>
        </li>
        @endif
             @if(\Berthe\Codegenerator\Core\ACLSpecificOperation::canAccessTable(\App\ACLFactory::getACL(), Auth::user()->role, "store"))
        <li>
            <a href="{{url("/store")}}">
                <i class="fa fa-amazon" aria-hidden="true"></i>
                <span class="text-md">Stores</span>
            </a>
        </li>
        @endif
             @if(\Berthe\Codegenerator\Core\ACLSpecificOperation::canAccessTable(\App\ACLFactory::getACL(), Auth::user()->role, "staff"))
        <li>
            <a href="{{url("/staff")}}">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span class="text-md">Staffs</span>
            </a>
        </li>
        @endif
     </ul>