<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a class="" href="{{ url('admin') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-files-o fa-fw"></i> Pages<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('admin/pages/create') }}">Create Pages</a>
                    </li>
                    <li>
                        <a href="{{ url('admin/pages') }}">Pages</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-newspaper-o fa-fw"></i> News<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('admin/news/create') }}">Create News</a>
                    </li>
                    <li>
                        <a href="{{ url('admin/news') }}">News</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-calendar fa-fw"></i> Events<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('admin/events/create') }}">Create Events</a>
                    </li>
                    <li>
                        <a href="{{ url('admin/events') }}">Events</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-bars fa-fw"></i> Link / Menus<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('admin/link/create') }}">Create Link / Menus</a>
                    </li>
                    <li>
                        <a href="{{ url('admin/link') }}">Link / Menus</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-info-circle fa-fw"></i> Current Issues<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('admin/issues/create') }}">Create Issues</a>
                    </li>
                    <li>
                        <a href="{{ url('admin/issues') }}">Issues</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <!--
            <li>
                <a href="#"><i class="fa fa-tag fa-fw"></i> Categories<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('admin/categories/create') }}">Create Categories</a>
                    </li>
                    <li>
                        <a href="{{ url('admin/categories') }}">Categories</a>
                    </li>
                </ul>
                <!-- /.nav-second-level
            </li>
            -->
            <li>
                <a class="" href="{{ url('admin/widget') }}"><i class="fa fa-anchor fa-fw"></i> Widget</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-eye fa-fw"></i> Banners<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('admin/banner/create') }}">Create Banners</a>
                    </li>
                    <li>
                        <a href="{{ url('admin/banner') }}">Banner</a>
                    </li>
                </ul>
            </li>
            <!--
            <li>
                <a href="#"><i class="fa fa-eye fa-fw"></i> Widget<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('admin/widget/create') }}">Add Widget</a>
                    </li>
                    <li>
                        <a href="{{ url('admin/widget') }}">Widget</a>
                    </li>
                </ul>
            </li>
            -->
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Setting<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('admin/settings') }}">General</a>
                    </li>
                    <li>
                        <a href="{{ url('admin/bank') }}">Bank</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-user fa-fw"></i> Admins<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('admin/add') }}">Create Admins</a>
                    </li>
                    <li>
                        <a href="{{ url('admin/manage') }}">Admins</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Sliders<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('admin/slider/create') }}">Create Sliders</a>
                    </li>
                    <li>
                        <a href="{{ url('admin/slider') }}">Sliders</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-tasks fa-fw"></i> Seminar<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('admin/seminar/create') }}">Create Seminar</a>
                    </li>
                    <li>
                        <a href="{{ url('admin/seminar') }}">Seminar</a>
                    </li>
                    <li>
                        <a href="{{ url('admin/registrant') }}">Registrant</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{{ url('admin/member') }}"><i class="fa fa-users fa-fw"></i> Members</a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>