<ul class="nav nav-main">
    <li>
        <a href="">
            <i class="fa fa-home" aria-hidden="true"></i>
            <span class="text-md">Dashboard</span>
        </a>
    </li>

    @foreach($tbs as $tab => $table)
        <li>
            <a href="{!!"{"."{url(\"/".$tab."\")}"."}"!!}">
                <i class="fa fa-home" aria-hidden="true"></i>
                <span class="text-md">{{ucfirst($tab)}}</span>
            </a>
        </li>
    @endforeach
</ul>