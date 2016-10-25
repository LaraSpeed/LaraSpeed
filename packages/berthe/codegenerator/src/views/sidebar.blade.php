<ul class="sidebar-nav">
    <li class="sidebar-brand">
        <a href="#menu-toggle" id="menu-toggle1"><h3>LaraSpeed</h3></a>
    </li>

    @foreach($tbs as $tab => $table)
    <li>
        <a href="{!!"{"."{url(\"/".$tab."\")}"."}"!!}">{{ucfirst($tab)}}</a>
    </li>
    @endforeach
</ul>