<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-right image">

            </div>

        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="active"><a href="../../index.html"><i class="fa fa-dashboard"></i><span>   داشبورد </span> </a></li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>کابران</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('users.index')}}"><i class="fa fa-circle-o"></i>لیست کاربران پنل </a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-list-alt"></i>
                    <span>تیم ها روش اول</span>
                    <span class="pull-left-container">
             <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('teams.index')}}"><i class="fa fa-circle-o"></i>لیست تیمها</a></li>
                    <li><a href="{{route('players.index')}}"><i class="fa fa-circle-o"></i>لیست بازیکنها</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-list-alt"></i>
                    <span>تیم ها روش دوم</span>
                    <span class="pull-left-container">
             <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('teamms.index')}}"><i class="fa fa-circle-o"></i>لیست تیمها</a></li>
                    <li><a href="{{route('playerrs.index')}}"><i class="fa fa-circle-o"></i>لیست بازیکنها</a></li>
                </ul>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
