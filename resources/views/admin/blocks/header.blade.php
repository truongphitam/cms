<header class="main-header">
    <a href="{!! route('index') !!}" class="logo" target="_blank">
        <span class="logo-mini"><b>W</b>EB</span>
        <span class="logo-lg"><b>WEBSITE</b></span>
    </a>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{!! Auth::guard('admins')->user()->image !!}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{Auth::guard('admins')->user()->name}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{!! Auth::guard('admins')->user()->image !!}" class="img-circle" alt="User Image">

                            <p>
                                {{Auth::guard('admins')->user()->name}}
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{!! route('member.show',Auth::guard('admins')->user()->id) !!}"
                                   class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="{!! route('login.logout') !!}" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>