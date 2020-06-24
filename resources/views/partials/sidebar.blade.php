<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Main</li>
                <li>
                    <a href="{{route('dashboard')}}" class="waves-effect"><i class="ti-home"></i><span class="badge badge-primary badge-pill float-right">2</span><span>Dashboard</span></a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-clipboard-text-outline"></i><span> Data Ketinggian <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span></span></a>
                    <ul class="submenu">
                        <li>
                            <a href="{{route('sungai')}}">Sungai</a>
                        </li>
                        <li>
                            <a href="{{route('debittumpah')}}">Debit Tumpah</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('report')}}" class="waves-effect"><i class="ti-calendar"></i><span>Report</span></a>
                </li>
                <li>
                    <a href="{{ route('admin.logout') }}" class="waves-effect"><i class="ti-power-off"></i><span>Logout</span></a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left --></div>