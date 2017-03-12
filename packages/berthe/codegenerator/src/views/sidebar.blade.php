<ul class="nav nav-main">
    <li>
        <a href="{!!"{"."{url(\"/home\")}"."}"!!}">
            <i class="fa fa-home" aria-hidden="true"></i>
            <span class="text-md">Dashboard</span>
        </a>
    </li>

    @foreach($tbs as $tab => $table)@if(!$config->isPivot($tab))
        S3Bif(\Berthe\Codegenerator\Core\ACLSpecificOperation::canAccessTable(\App\ACLFactory::getACL(), Auth::user()->role, "{!! $tab !!}"))
        <li>
            <a href="{!!"{"."{url(\"/".$tab."\")}"."}"!!}">
                <i class="{{$config->getTableIcon($tab)}}" aria-hidden="true"></i>
                <span class="text-md">{{ucfirst($config->getPluralForm($tab))}}</span>
            </a>
        </li>
        S3Bendif
    @endif @endforeach
</ul>