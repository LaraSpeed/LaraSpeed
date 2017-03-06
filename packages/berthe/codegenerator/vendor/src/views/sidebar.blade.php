<ul class="nav nav-main">
    <li>
        <a href="">
            <i class="fa fa-home" aria-hidden="true"></i>
            <span>Dashboard</span>
        </a>
    </li>

    @foreach($tbs as $tab => $table)
        <li>
            <a href="{!!"{"."{url(\"/".$tab."\")}"."}"!!}">
                <i class="fa fa-home" aria-hidden="true"></i>
                <span>{{ucfirst($tab)}}</span>
            </a>
        </li>
    @endforeach
</ul>