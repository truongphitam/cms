<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{!! Auth::guard('admins')->user()->image !!}" class="img-circle"
                     alt="{!! Auth::guard('admins')->user()->name !!}">
            </div>
            <div class="pull-left info">
                <p>{{Auth::guard('admins')->user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{!! areActiveRoutes(['admin.dashboard'],'active') !!}">
                <a href="{!! route('admin.dashboard') !!}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview {!! areActiveRoutes(['post.index','post.create','post.show','post.cate.index','post.cate.show'],'active') !!}">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>{!! trans('admin.object.post') !!}</span>
                    <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{!! areActiveRoutes(['post.index','post.show'],'active') !!}">
                        <a
                                href="{!! route('post.index') !!}"><i
                                    class="fa fa-circle-o"></i> {!! trans('admin.field.list') !!}</a></li>
                    <li class="{!! areActiveRoutes(['post.create'],'active') !!}"><a
                                href="{!! route('post.create') !!}"><i
                                    class="fa fa-circle-o"></i> {!! trans('admin.field.add') !!}</a></li>
                    <li class="{!! areActiveRoutes(['post.cate.index','post.cate.show'],'active') !!}"><a
                                href="{!! route('post.cate.index') !!}"><i
                                    class="fa fa-circle-o"></i> {!! trans('admin.field.categories') !!}</a></li>
                </ul>
            </li>
            <li class="treeview {!! areActiveRoutes(['page.index','page.create','page.show'],'active') !!}">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>{!! trans('admin.object.page') !!}</span>
                    <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{!! areActiveRoutes(['page.index','page.show'],'active') !!}"><a
                                href="{!! route('page.index') !!}"><i
                                    class="fa fa-circle-o"></i> {!! trans('admin.field.list') !!}</a></li>
                    <li class="{!! isActiveRoute('page.create','active') !!}"><a href="{!! route('page.create') !!}"><i
                                    class="fa fa-circle-o"></i> {!! trans('admin.field.add') !!}</a></li>
                </ul>
            </li>
            <li class="treeview {!! areActiveRoutes(['products.index','products.create','products.show','products.cate.index','products.cate.show'],'active') !!}">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>{!! trans('admin.object.products') !!}</span>
                    <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{!! areActiveRoutes(['products.index','products.show'],'active') !!}">
                        <a
                                href="{!! route('products.index') !!}"><i
                                    class="fa fa-circle-o"></i> {!! trans('admin.field.list') !!}</a></li>
                    <li class="{!! areActiveRoutes(['products.create'],'active') !!}"><a
                                href="{!! route('products.create') !!}"><i
                                    class="fa fa-circle-o"></i> {!! trans('admin.field.add') !!}</a></li>
                    <li class="{!! areActiveRoutes(['products.cate.index','products.cate.show'],'active') !!}"><a
                                href="{!! route('products.cate.index') !!}"><i
                                    class="fa fa-circle-o"></i> {!! trans('admin.field.categories') !!}</a></li>
                </ul>
            </li>
            <li class="treeview {!! areActiveRoutes(['settings.overview','settings.translation','settings.custom'],'active') !!}">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>{!! trans('admin.object.settings') !!}</span>
                    <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{!! areActiveRoutes(['settings.overview'],'active') !!}"><a
                                href="{!! route('settings.overview') !!}"><i
                                    class="fa fa-circle-o"></i> {!! trans('admin.object.overview') !!}</a></li>
                    <li class="{!! areActiveRoutes(['settings.translation'],'active') !!}"><a
                                href="{!! route('settings.translation') !!}"><i
                                    class="fa fa-circle-o"></i> {!! trans('admin.object.translation') !!}</a></li>
                    <li class="{!! areActiveRoutes(['settings.custom'],'active') !!}"><a
                                href="{!! route('settings.custom') !!}"><i
                                    class="fa fa-circle-o"></i> {!! trans('admin.object.custom') !!}</a></li>
                </ul>
            </li>
            <li class="{!! areActiveRoutes(['slider.index','slider.add','slider.show'],'active') !!}">
                <a href="{!! route('slider.index') !!}">
                    <i class="fa fa-dashboard"></i> <span>{!! trans('admin.object.slider') !!}</span>
                </a>
            </li>
            <li class="treeview {!! areActiveRoutes(['member.index','member.create','member.show'],'active') !!}">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>{!! trans('admin.object.member') !!}</span>
                    <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{!! areActiveRoutes(['member.index','member.show'],'active') !!}"><a
                                href="{!! route('member.index') !!}"><i
                                    class="fa fa-circle-o"></i> {!! trans('admin.field.list') !!}</a></li>
                    <li class="{!! isActiveRoute('member.create','active') !!}"><a
                                href="{!! route('member.create') !!}"><i
                                    class="fa fa-circle-o"></i> {!! trans('admin.field.add') !!}</a></li>
                </ul>
            </li>
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
        </ul>
    </section>
</aside>