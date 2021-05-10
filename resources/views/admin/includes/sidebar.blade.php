<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title" key="t-menu">Menu</li>

        <li>
            <a href="/" class="waves-effect">
                <i class="bx bx-home-circle"></i><span class="badge rounded-pill bg-info float-end"></span>
                <span key="t-dashboards">Dashboards</span>
            </a>
        </li>
        @if (Auth::user()->user_role!='Student')
        @if (Auth::user()->user_type==1)
        {{-- <li>
            <a href="#" class="has-arrow waves-effect">
                <i class="bx bx-layout"></i>
                <span key="t-layouts">Manage User</span>
            </a>
            <ul class="sub-menu" aria-expanded="true">
                <li>
                    <a href="/create-user" key="t-vertical">Add User</a>
                </li>

                <li>
                    <a href="/users" key="t-horizontal">All Users</a>
                </li>
            </ul>
        </li> --}}
        @endif


        <li class="menu-title" key="t-apps">Actions</li>
        <li>
            <a href="/create-plo-generation" class="waves-effect">
                <i class="bx bx-file"></i>
                <span key="t-utility">PLO GENERATION</span>
            </a>
            <a href="/plo-table-search" class="waves-effect">
                <i class="bx bx-file"></i>
                <span key="t-utility">PLO Table</span>
            </a>
            <a href="{{route('course.create')}}" class="waves-effect">
                <i class="bx bx-file"></i>
                <span key="t-utility">Create Course</span>
            </a>
        </li>
        @else
        <li class="menu-title" key="t-apps">Actions</li>
        <li>
            <a href="/plo-table-search" class="waves-effect">
                <i class="bx bx-file"></i>
                <span key="t-utility">PLO Table</span>
            </a>
            <a href="{{route('enroll.course')}}" class="waves-effect">
                <i class="bx bx-file"></i>
                <span key="t-utility">Enroll Course</span>
            </a>
        </li>
        @endif

    </ul>
</div>
